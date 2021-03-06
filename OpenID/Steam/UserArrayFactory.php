<?php declare(strict_types = 1);

namespace Vairogs\Addon\Auth\OpenID\Steam;

use Vairogs\Addon\Auth\OpenID\Steam\Contracts\User;

class UserArrayFactory
{
    /**
     * @param User $user
     * @param array $bag
     * @return User
     */
    public static function create(User $user, array $bag): User
    {
        $avatar = [
            'small' => $bag['avatar'] ?? '',
            'medium' => $bag['avatarmedium'] ?? '',
            'largs' => $bag['avatarfull'] ?? '',
            'hash' => $bag['avatarhash'],
        ];

        return $user
            ->setOpenID($bag['steamid'] ?? null)
            ->setCommunityState($bag['communityvisibilitystate'] ?? 0)
            ->setProfileState($bag['profilestate'] ?? 0)
            ->setPersona($bag['personaname'] ?? $bag['steamid'])
            ->setCommentPermission($bag['commentpermission'] ?? 0)
            ->setUrl($bag['profileurl'] ?? '')
            ->setLogoff($bag['lastlogoff'] ?? 0)
            ->setPersonaState($bag['personastate'] ?? 0)
            ->setName($bag['realname'] ?? $bag['personaname'] ?? $bag['steamid'])
            ->setClanId((int)($bag['primaryclanid'] ?? 0))
            ->setCreatedAt($bag['timecreated'] ?? 0)
            ->setPersonaFlags($bag['personastateflags'] ?? 0)
            ->setCountryCode($bag['loccountrycode'] ?? 'UNKNOWN')
            ->setStateCode((int)($bag['locstatecode'] ?? 0))
            ->setPlaying($bag['gameextrainfo'] ?? '')
            ->setPlayingId((int)($bag['gameid'] ?? 0))
            ->setAvatar($avatar)
            ->setUsername($bag['username'] ?? null);
    }
}
