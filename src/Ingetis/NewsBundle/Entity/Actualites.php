<?php

namespace Ingetis\NewsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; 
/**
 * Actualites
 *
 * @ORM\Table(name="actualites")
 * @ORM\Entity
 */
class Actualites
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_actualite", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idActualite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="event", type="boolean", nullable=false)
     */
    private $event = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="titre_actualite", type="string", length=250, nullable=true)
     *@Assert\NotBlank()
     */
    private $titreActualite;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_actualite", type="text", nullable=true)
     */
    private $texteActualite;

    /**
     * @var integer
     *
     * @ORM\Column(name="vues_actualite", type="integer", nullable=true)
     */
    private $vuesActualite = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="date_actualite", type="integer", nullable=true)
     */
    private $dateActualite = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="photo_actualite", type="string", length=250, nullable=true)
     */
    private $photoActualite;

    /**
     * @var string
     *
     * @ORM\Column(name="last_ip_actualite", type="string", length=250, nullable=true)
     */
    private $lastIpActualite = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="last_visit", type="integer", nullable=true)
     */
    private $lastVisit = '0';

    public function __construct(){
        $this->dateActualite = time();
    }

    /**
     * Get idActualite
     *
     * @return integer 
     */
    public function getIdActualite()
    {
        return $this->idActualite;
    }

    /**
     * Set event
     *
     * @param boolean $event
     * @return Actualites
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return boolean 
     */
    public function getEvent()
    {
        return $this->event;
    }
   
    /**
     * Set titreActualite
     *
     * @param string $titreActualite
     * @return Actualites
     */
    public function setTitreActualite($titreActualite)
    {
        $this->titreActualite = $titreActualite;

        return $this;
    }

    /**
     * Get titreActualite
     *
     * @return string 
     */
    public function getTitreActualite()
    {
        return $this->titreActualite;
    }

    /**
     * Set artisteActualite
     *
     * @param string $artisteActualite
     * @return Actualites
     */
    public function setArtisteActualite($artisteActualite)
    {
        $this->artisteActualite = $artisteActualite;

        return $this;
    }

    /**
     * Get artisteActualite
     *
     * @return string 
     */
    public function getArtisteActualite()
    {
        return $this->artisteActualite;
    }

    /**
     * Set texteActualite
     *
     * @param string $texteActualite
     * @return Actualites
     */
    public function setTexteActualite($texteActualite)
    {
        $this->texteActualite = $texteActualite;

        return $this;
    }

    /**
     * Get texteActualite
     *
     * @return string 
     */
    public function getTexteActualite()
    {
        return $this->texteActualite;
    }

    /**
     * Set vuesActualite
     *
     * @param integer $vuesActualite
     * @return Actualites
     */
    public function setVuesActualite($vuesActualite)
    {
        $this->vuesActualite = $vuesActualite;

        return $this;
    }

    /**
     * Get vuesActualite
     *
     * @return integer 
     */
    public function getVuesActualite()
    {
        return $this->vuesActualite;
    }

    /**
     * Set dateActualite
     *
     * @param integer $dateActualite
     * @return Actualites
     */
    public function setDateActualite($dateActualite)
    {
        $this->dateActualite = $dateActualite;

        return $this;
    }

    /**
     * Get dateActualite
     *
     * @return integer 
     */
    public function getDateActualite()
    {
        return $this->dateActualite;
    }

    /**
     * Set photoActualite
     *
     * @param string $photoActualite
     * @return Actualites
     */
    public function setPhotoActualite($photoActualite)
    {
        $this->photoActualite = $photoActualite;

        return $this;
    }

    /**
     * Get photoActualite
     *
     * @return string 
     */
    public function getPhotoActualite()
    {
        return $this->photoActualite;
    }
    
    /**
     * Set lastIpActualite
     *
     * @param string $lastIpActualite
     * @return Actualites
     */
    public function setLastIpActualite($lastIpActualite)
    {
        $this->lastIpActualite = $lastIpActualite;

        return $this;
    }

    /**
     * Get lastIpActualite
     *
     * @return string 
     */
    public function getLastIpActualite()
    {
        return $this->lastIpActualite;
    }

    /**
     * Set lastVisit
     *
     * @param integer $lastVisit
     * @return Actualites
     */
    public function setLastVisit($lastVisit)
    {
        $this->lastVisit = $lastVisit;

        return $this;
    }

    /**
     * Get lastVisit
     *
     * @return integer 
     */
    public function getLastVisit()
    {
        return $this->lastVisit;
    }
}
