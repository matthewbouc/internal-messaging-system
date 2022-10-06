<?php

namespace App\Entity;

use App\Repository\UserSettingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSettingRepository::class)]
class UserSetting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $theme_primary_color = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $theme_secondary_color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThemePrimaryColor(): ?string
    {
        return $this->theme_primary_color;
    }

    public function setThemePrimaryColor(?string $theme_primary_color): self
    {
        $this->theme_primary_color = $theme_primary_color;

        return $this;
    }

    public function getThemeSecondaryColor(): ?string
    {
        return $this->theme_secondary_color;
    }

    public function setThemeSecondaryColor(?string $theme_secondary_color): self
    {
        $this->theme_secondary_color = $theme_secondary_color;

        return $this;
    }
}
