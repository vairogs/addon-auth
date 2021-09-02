<?php declare(strict_types = 1);

namespace Vairogs\Addon\Auth\OpenID\Steam\Model;

use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Stringable;
use Vairogs\Addon\Auth\OpenID\Steam\Contracts\User;
use Vairogs\Component\Auth\OpenID\Contracts\OpenIDUser;
use Vairogs\Extra\Constants\Type\Numeric;
use Vairogs\Extra\Constants\Type\Basic;

/**
 * @ORM\MappedSuperclass()
 */
#[ORM\MappedSuperclass]
class Steam implements OpenIDUser, User, Stringable
{
    public const RETURNS_EMAIL = false;

    /**
     * @ORM\Column(type=Basic::STRING, unique=true)
     */
    #[ORM\Column(type: Basic::STRING, unique: true)]
    protected string $openID;

    /**
     * @ORM\Column(type=Basic::INTEGER)
     */
    #[ORM\Column(type: Basic::INTEGER)]
    protected int $communityState;

    /**
     * @ORM\Column(type=Basic::INTEGER)
     */
    #[ORM\Column(type: Basic::INTEGER)]
    protected int $profileState;

    /**
     * @ORM\Column(type=Basic::STRING)
     */
    #[ORM\Column(type: Basic::STRING)]
    protected string $persona;

    /**
     * @ORM\Column(type=Basic::INTEGER)
     */
    #[ORM\Column(type: Basic::INTEGER)]
    protected int $commentPermission;

    /**
     * @ORM\Column(type=Basic::STRING)
     */
    #[ORM\Column(type: Basic::STRING)]
    protected string $url;

    /**
     * @ORM\Column(type=Basic::ARRAY)
     */
    #[ORM\Column(type: Basic::ARRAY)]
    protected array $avatar;

    /**
     * @ORM\Column(type=Basic::INTEGER)
     */
    #[ORM\Column(type: Basic::INTEGER)]
    protected int $personaState;

    /**
     * @ORM\Column(type=Basic::INTEGER, nullable=true)
     */
    #[ORM\Column(type: Basic::INTEGER, nullable: true)]
    protected ?int $logoff = null;

    /**
     * @ORM\Column(type=Basic::STRING, nullable=true)
     */
    #[ORM\Column(type: Basic::STRING, nullable: true)]
    protected ?string $name = null;

    /**
     * @ORM\Column(type=Numeric::BIGINT, nullable=true)
     */
    #[ORM\Column(type: Numeric::BIGINT, nullable: true)]
    protected ?int $clanId = null;

    /**
     * @ORM\Column(type=Basic::INTEGER, nullable=true)
     */
    #[ORM\Column(type: Basic::INTEGER, nullable: true)]
    protected int $createdAt;

    /**
     * @ORM\Column(type=Basic::INTEGER, nullable=true)
     */
    #[ORM\Column(type: Basic::INTEGER, nullable: true)]
    protected int $personaFlags;

    /**
     * @ORM\Column(type=Basic::STRING, nullable=true)
     */
    #[ORM\Column(type: Basic::STRING, nullable: true)]
    protected ?string $countryCode = null;

    /**
     * @ORM\Column(type=Basic::INTEGER, nullable=true)
     */
    #[ORM\Column(type: Basic::INTEGER, nullable: true)]
    protected ?int $stateCode = null;

    /**
     * @ORM\Column(type=Basic::STRING, nullable=true)
     */
    #[ORM\Column(type: Basic::STRING, nullable: true)]
    protected ?string $playing = null;

    /**
     * @ORM\Column(type=Basic::INTEGER, nullable=true)
     */
    #[ORM\Column(type: Basic::INTEGER, nullable: true)]
    protected ?int $playingId = null;

    /**
     * @ORM\Column(type=Basic::STRING, nullable=true, unique=true)
     */
    #[ORM\Column(type: Basic::STRING, unique: true, nullable: true)]
    protected ?string $username = null;

    #[Pure]
    public function __toString(): string
    {
        return $this->openID;
    }

    public function getAvatar(): array
    {
        return $this->avatar;
    }

    public function setAvatar(array $avatar): User
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getClanId(): ?int
    {
        return $this->clanId;
    }

    public function setClanId(?int $clanId): User
    {
        $this->clanId = $clanId;

        return $this;
    }

    public function getCommentPermission(): int
    {
        return $this->commentPermission;
    }

    public function setCommentPermission(int $commentPermission): User
    {
        $this->commentPermission = $commentPermission;

        return $this;
    }

    public function getCommunityState(): int
    {
        return $this->communityState;
    }

    public function setCommunityState(int $communityState): User
    {
        $this->communityState = $communityState;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): User
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function setCreatedAt(int $createdAt): User
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEmail(): ?string
    {
        return null;
    }

    public function getLogoff(): ?int
    {
        return $this->logoff;
    }

    public function setLogoff(?int $logoff): User
    {
        $this->logoff = $logoff;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): User
    {
        $this->name = $name;

        return $this;
    }

    public function getOpenID(): string
    {
        return $this->openID;
    }

    public function setOpenID(string $openId): User
    {
        $this->openID = $openId;

        return $this;
    }

    public function getPersona(): string
    {
        return $this->persona;
    }

    public function setPersona(string $persona): User
    {
        $this->persona = $persona;

        return $this;
    }

    public function getPersonaFlags(): int
    {
        return $this->personaFlags;
    }

    public function setPersonaFlags(int $personaFlags): User
    {
        $this->personaFlags = $personaFlags;

        return $this;
    }

    public function getPersonaState(): int
    {
        return $this->personaState;
    }

    public function setPersonaState(int $personaState): User
    {
        $this->personaState = $personaState;

        return $this;
    }

    public function getPlaying(): ?string
    {
        return $this->playing;
    }

    public function setPlaying(?string $playing): User
    {
        $this->playing = $playing;

        return $this;
    }

    public function getPlayingId(): ?int
    {
        return $this->playingId;
    }

    public function setPlayingId(?int $playingId): User
    {
        $this->playingId = $playingId;

        return $this;
    }

    public function getProfileState(): int
    {
        return $this->profileState;
    }

    public function setProfileState(int $profileState): User
    {
        $this->profileState = $profileState;

        return $this;
    }

    public function getStateCode(): ?int
    {
        return $this->stateCode;
    }

    public function setStateCode(?int $stateCode): User
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): User
    {
        $this->url = $url;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): Steam
    {
        $this->username = $username;

        return $this;
    }

    public function returnsEmail(): bool
    {
        return self::RETURNS_EMAIL;
    }
}
