<?php

namespace Acme\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\UserBundle\Entity\UsersRole;
use Acme\UserBundle\Form\UsersRoleType;

/**
 * UsersRole controller.
 *
 * @Route("/auten/usersrole")
 */
class UsersRoleController extends Controller
{

    /**
     * Lists all UsersRole entities.
     *
     * @Route("/", name="auten_usersrole")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeUserBundle:UsersRole')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new UsersRole entity.
     *
     * @Route("/", name="auten_usersrole_create")
     * @Method("POST")
     * @Template("AcmeUserBundle:UsersRole:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new UsersRole();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('auten_usersrole_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a UsersRole entity.
    *
    * @param UsersRole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(UsersRole $entity)
    {
        $form = $this->createForm(new UsersRoleType(), $entity, array(
            'action' => $this->generateUrl('auten_usersrole_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UsersRole entity.
     *
     * @Route("/new", name="auten_usersrole_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new UsersRole();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a UsersRole entity.
     *
     * @Route("/{id}", name="auten_usersrole_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeUserBundle:UsersRole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsersRole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing UsersRole entity.
     *
     * @Route("/{id}/edit", name="auten_usersrole_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeUserBundle:UsersRole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsersRole entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a UsersRole entity.
    *
    * @param UsersRole $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UsersRole $entity)
    {
        $form = $this->createForm(new UsersRoleType(), $entity, array(
            'action' => $this->generateUrl('auten_usersrole_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UsersRole entity.
     *
     * @Route("/{id}", name="auten_usersrole_update")
     * @Method("PUT")
     * @Template("AcmeUserBundle:UsersRole:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeUserBundle:UsersRole')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UsersRole entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('auten_usersrole_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a UsersRole entity.
     *
     * @Route("/{id}", name="auten_usersrole_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeUserBundle:UsersRole')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UsersRole entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('auten_usersrole'));
    }

    /**
     * Creates a form to delete a UsersRole entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auten_usersrole_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
