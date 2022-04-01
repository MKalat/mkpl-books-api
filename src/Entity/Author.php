<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="author")
 * @ApiResource(
 *     normalizationContext={"groups" = {"read"}},
 *     denormalizationContext={"groups" = {"write"}},
 *     itemOperations={
 *          "get"={"access_control"="is_granted('ROLE_USER')"}
 *          "put"={"access_control"="is_granted('ROLE_USER')"}
 *          "delete"={"access_control"="is_granted('ROLE_USER')"}
 *          "patch"={"access_control"="is_granted('ROLE_USER')"}
 *     },
 * )
 */
class author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    public ?int $id_m;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $name_surname;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $created_at = null;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $nationality;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $specialisation;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $chapters;


    /******** METHODS ********/

    public function getId()
    {
        return $this->id;
    }

    /**
     * Prepersist gets triggered on Insert
     * @ORM\PrePersist
     */
    public function updatedTimestamps()
    {
        if ($this->created_at == null) {
            $this->created_at = new \DateTime('now');
        }
    }

    public function __toString()
    {
        return (string)$this->id;
    }
}

