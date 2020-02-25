<?php

namespace App\Containers\User\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Events\UserRegisteredEvent;
use App\Containers\User\Mails\UserRegisteredMail;
use App\Containers\User\Models\User;
use App\Containers\User\Notifications\UserRegisteredNotification;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

/**
 * Class RegisterUserAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class RegisterUserAction extends Action
{

    /**
     * @param \App\Ship\Transporters\DataTransporter $data
     *
     * @return  \App\Containers\User\Models\User
     */
    public function run(array $data, $files = null): User
    {

        $user = Apiato::call('User@CreateUserByCredentialsTask', [
            0 => true,
            isset($data['email']) ? $data['email'] : null,
            isset($data['password']) ? $data['password'] : null,
            isset($data['name']) ? $data['name'] : null,
            isset($data['gender']) ? $data['gender'] : null,
            isset($data['birth']) ? $data['birth'] : null
        ])->assignRole(Apiato::call('Authorization@FindRoleTask', [isset($data['roles']) ? $data['roles'] : $data['role']]));

        $data['user_id'] = $user->id;

        if($files) {
            $uploads = Apiato::call('Media@UploadMediaTask', [$files]);

            $media = Apiato::call('Media@CreateMediaTask', [$uploads]);
            $mId = $media->first()->id;

            $data["media_id"] = $mId;
        }

        $profile = Apiato::call('Profile@CreateProfileTask', [$data]);

        Mail::send(new UserRegisteredMail($user));

        Notification::send($user, new UserRegisteredNotification($user));

        App::make(Dispatcher::class)->dispatch(New UserRegisteredEvent($user));

        return $user;
    }
}
