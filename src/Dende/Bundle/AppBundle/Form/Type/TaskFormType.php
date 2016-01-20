<?php
namespace Dende\Bundle\AppBundle\Form\Type;

use Dende\Application\Command\CreateTask;
use Dende\Domain\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TaskFormType.
 */
class TaskFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'hidden')
            ->add('listId', 'hidden')
            ->add('title', 'text')
            ->add('content', 'textarea')
            ->add('submit', 'submit', [
                'label' => 'todo.task_form.update.label',
            ]);
    }

    public function getName()
    {
        return 'task';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => CreateTask::class,
            'csrf_protection' => true,
            'error_bubbling'  => false,
            'attr'            => [
                'novalidate' => 'NOVALIDATE',
            ],
        ]);
    }
}
