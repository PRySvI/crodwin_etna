<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"},message="l'email est deja utilise ")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255 , unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255 , unique=true)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire au minimum 8 caractères")
     * @Assert\EqualTo(propertyPath="password_repeat", message="Les deux mots de passe renseignés ne correspondent pas")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les deux mots de passe renseignés ne correspondent pas")
     */
    private $password_repeat;

    /**
     * @return mixed
     */
    public function getPasswordRepeat()
    {
        return $this->password_repeat;
    }

    /**
     * @param mixed $password_repeat
     */
    public function setPasswordRepeat($password_repeat): void
    {
        $this->password_repeat = $password_repeat;
    }

    /**
     * @ORM\Column(type="string", length=255 , unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $language = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return array('ROLE_USER');
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
         return ['ROLE_USER'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLanguage(): ?array
    {
        return $this->language;
    }

    public function setLanguage(?array $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getDefaultLang()
    {
        return $this->language;
    }

    public function setDefaultLang($default_lang): self
    {
        $this->default_lang = $default_lang;

        return $this;
    }

    public function addLanguage(string $lang): self
    {

        array_push($this->language , $lang);

        return $this;
    }

    /**
     * @var string le token qui servira lors de l'oubli de mot de passe
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $resetToken;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="Owner", orphanRemoval=true)
     */
    private $projects;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getResetToken(): string
    {
        return $this->resetToken;
    }

    /**
     * @param string $resetToken
     */
    public function setResetToken(?string $resetToken): void
    {
        $this->resetToken = $resetToken;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function getProjectByName($name)
    {
        foreach ($this->getProjects() as $project)
        {
            if($project->getName()===$name)
            {
                return $project;
            }
        }
        return null;
    }

    public function getProjectById($id)
    {
        foreach ($this->getProjects() as $project)
        {
            if($project->getId()==$id)
            {
                return $project;
            }
        }
        return null;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setOwner($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getOwner() === $this) {
                $project->setOwner(null);
            }
        }

        return $this;
    }
}
