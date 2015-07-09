<?php
/**
 * Created by PhpStorm.
 * User: JuanitoB
 * Date: 04/07/2015
 * Time: 17:12
 */

namespace SpiritDev\Bundle\BugReporterBundle\Entity;

use Symfony\Component\Validator\Constraint as Assert;

class BugReport {

    /**
     * @Assert\NotBlank(message="Veuillez définir un Objet.")
     */
    protected $messageObject;

    /**
     * @Assert\NotBlank(message="Veuillez préciser l'incident.")
     */
    protected $messageContent;

    /**
     * @Assert\NotBlank(message="Veuillez définir une Priorité.")
     */
    protected $priority;

    /**
     * @Assert\NotBlank(message="Veuillez définir un Id Projet.")
     */
    protected $projecId;

    /**
     * @Assert\NotBlank(message="Veuillez définir un Id Partenaire.")
     */
    protected $partnerId;

    /**
     * @Assert\NotBlank(message="Veuillez définir un Mail du Contact.")
     */
    protected $contactMail;

    /**
     * @return mixed
     */
    public function getMessageObject() {
        return $this->messageObject;
    }

    /**
     * @param mixed $messageObject
     */
    public function setMessageObject($messageObject) {
        $this->messageObject = $messageObject;
    }

    /**
     * @return mixed
     */
    public function getMessageContent() {
        return $this->messageContent;
    }

    /**
     * @param mixed $messageContent
     */
    public function setMessageContent($messageContent) {
        $this->messageContent = $messageContent;
    }

    /**
     * @return mixed
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority) {
        $this->priority = $priority;
    }

    /**
     * @return mixed
     */
    public function getProjecId() {
        return $this->projecId;
    }

    /**
     * @param mixed $projecId
     */
    public function setProjecId($projecId) {
        $this->projecId = $projecId;
    }

    /**
     * @return mixed
     */
    public function getPartnerId() {
        return $this->partnerId;
    }

    /**
     * @param mixed $partnerId
     */
    public function setPartnerId($partnerId) {
        $this->partnerId = $partnerId;
    }

    /**
     * @return mixed
     */
    public function getContactMail() {
        return $this->contactMail;
    }

    /**
     * @param mixed $contactMail
     */
    public function setContactMail($contactMail) {
        $this->contactMail = $contactMail;
    }



}