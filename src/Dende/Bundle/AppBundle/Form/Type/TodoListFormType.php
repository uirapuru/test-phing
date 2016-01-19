<?php
namespace Dende\Bundle\AppBundle\Form\Type;

use Dende\Domain\TodoList;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Valid;

class TodoListFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'tasks',
                'collection',
                [
                    'class'          => "Dende\Domain\Task",
                    'type'           => new TaskFormType(),
                    'allow_add'      => true,
                    'allow_delete'   => true,
                    'by_reference'   => false,
                    'prototype'      => true,
                    'prototype_name' => '__task__',
                    'label'          => 'tasks.list_label',
                    'error_bubbling' => false,
                    'constraints'    => [
                        new Valid(),
                    ],
                ]
            )
            ->add(
                'new_task',
                'text',
                [
                    'mapped' => false,
                ]
            );
    }

    public function getName()
    {
        return 'todo_list';
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => TodoList::class,
            'csrf_protection' => true,
        ]);
    }
}
