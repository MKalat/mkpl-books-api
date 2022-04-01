<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="publishing")
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
class publishing
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
    public string $publisher;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $created_at = null;

    /**
     * @ORM\Column(type="datetime")
     */
    public ?\DateTime $date_published = null;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $language;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $pub_number;

    /**
     * @ORM\Column(length=70)
     * @Assert\NotBlank()
     */
    public string $country;


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


