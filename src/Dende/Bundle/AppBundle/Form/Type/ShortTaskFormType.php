<?php
namespace Dende\Bundle\AppBundle\Form\Type;

use Dende\Application\Command\CreateTask;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TaskFormType.
 */
class ShortTaskFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', ['label' => false])
            ->add('listId', 'hidden')
            ->add('submit', 'submit', [
                'label' => 'todo.task_form.add.label',
            ]);
    }

    public function getName()
    {
        return 'short_task';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => CreateTask::class,
            'csrf_protection' => true,
            'error_bubbling'  => false,
        ]);
    }
}
