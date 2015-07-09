<?php
/**
 * Created by PhpStorm.
 * User: JuanitoB
 * Date: 04/07/2015
 * Time: 17:28
 */

namespace SpiritDev\Bundle\BugReporterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Collection;

class BugReportType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('message_object', 'text', array('attr' => array(
                'placeholder' => 'Saisir l\'objet de l\'incident.'
            )))
            ->add('priority', 'choice', array(
                'choices' => array(
                    '0' => 'Basse',
                    '1' => 'Normale',
                    '2' => 'Important'
                ),
                'placeholder' => 'Définir le niveau de criticité de l\'incident.'
            ))
            ->add('message_content', 'textarea', array('attr' => array(
                'cols' => 45, 'rows' => 5,
                'placeholder' => 'Préciser l\'incident (comment a-t-il été produit, ...).'
            )));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Main\BugReportBundle\Entity\BugReport',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'intention' => 'bug_report_item',
        ));
    }

    public function getName() {
        return 'bug_report';
    }
}