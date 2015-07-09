<?php

namespace SpiritDev\Bundle\BugReporterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Buzz\Browser;
use SpiritDev\Bundle\BugReporterBundle\Entity\BugReport;
use SpiritDev\Bundle\BugReporterBundle\Form\BugReportType;

class DefaultController extends Controller
{
    /**
     * @Route("/bug_report", name="bug_report")
     */
    public function bugReportAction(Request $request) {
        // Create new contact entity
        $bugReport = new BugReport();
        // Override fixed informations
        $bugReport->setProjecId($this->container->getParameter('odoo_project_ref_id'));
        $bugReport->setPartnerId($this->container->getParameter('odoo_partner_ref_id'));
        $bugReport->setContactMail($this->container->getParameter('odoo_contact_mail'));

        $bugReport->setMessageObject($request->get('message_object'));
        $bugReport->setPriority($request->get('priority'));
        $bugReport->setMessageContent($request->get('message_content'));
        // Creating form with ContactType form & contact entity
//        $form = $this->createForm(new BugReportType(), $bugReport);
        // Default response status
        $status = 400;
        $content = "not treated";
        // If method POST
        if ($request->isMethod('POST')) {
            // Bind request to form
//            $form->handleRequest($request);
            // if bind well
            if ($this->isValidBug($bugReport)) {
                # Get values
//                $contactType = $form->get('contactType')->getConfig()->getOption('choices')[$form->get('contactType')->getData()];
//                $messageObject = $form->get('messageObject')->getData();

                // Add Odoo lead
                $newLeadIssue = $this->addOdooIssue($bugReport);
                // if Admin send ok
                if (gettype($newLeadIssue['action_result']) == 'integer') {
                    // Send Prospect confirmation mail
//                    $sentProspect = $this->sendProspectMail($form, $contactType);
                    // Send admin mail
//                    $this->sendAdminMail(
//                        $request,
//                        $form,
//                        $bugReport,
//                        $messageObject,
//                        $contactType,
//                        $sentProspect,
//                        $newLeadIssue
//                    );
                    // Status 201
                    $status = 200;
                    $content = "ok";
                } else {
                    // Status 400
                    $status = 406;
                    $content = "odoo nok";
                }
            } else {
                $status = 406;
                $content = "invalid form";
            }
        }
        $response = new Response('Content', $status, array('content-type' => 'text/html'));
        $response->setContent($content);
        return $response;
    }

    private function isValidBug(BugReport $bug) {
        $issue = true;

        // Fixed infos
        if($bug->getContactMail() == null) $issue = false;
        if($bug->getPartnerId() == null) $issue = false;
        if($bug->getProjecId() == null) $issue = false;
        // Variable infos
        if($bug->getMessageContent() == null) $issue = false;
        if($bug->getMessageObject() == null) $issue = false;
        if($bug->getPriority() == null) $issue = false;

        return $issue;
    }

    private function addOdooIssue(BugReport $bugReport) {
        // Preparing datas to transmit
        $jsonPayload = json_encode([
            'message_object' => $bugReport->getMessageObject(),
            'email' => $bugReport->getContactMail(),
            'message_content' => $bugReport->getMessageContent(),
            'project_id' => $bugReport->getProjecId(),
            'partner_id' => $bugReport->getPartnerId(),
            'priority' => $bugReport->getPriority()
        ]);
        // Creating external requestor
        $browser = new Browser();
        // Setting hraders
        $headers = ['Content-Type' => 'application/json'];
        // Setting Odoo Middleware urls
        $request = $browser->post($this->container->getParameter('odoo_middleware_url')."/newIssue", $headers, $jsonPayload);
        // Getting request reulst
        $response = json_decode($request->getContent(), true);
        return ($response);
    }
}
