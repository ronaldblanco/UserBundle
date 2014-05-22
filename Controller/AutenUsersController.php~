<?php

namespace Acme\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\UserBundle\Entity\AutenUsers;
use Acme\UserBundle\Form\AutenUsersType;

/**
 * AutenUsers controller.
 *
 * @Route("/auten/users")
 */
class AutenUsersController extends Controller
{

    /**
     * Lists all AutenUsers entities.
     *
     * @Route("/", name="auten_users")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeUserBundle:AutenUsers')->findAll();
	$entitiesrole = $em->getRepository('AcmeUserBundle:Role')->findAll();

        return array(
            'entities' => $entities, 'entitiesrole' => $entitiesrole,
        );
    }
    /**
     * Creates a new AutenUsers entity.
     *
     * @Route("/", name="auten_users_create")
     * @Method("POST")
     * @Template("AcmeUserBundle:AutenUsers:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AutenUsers();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('auten_users_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a AutenUsers entity.
    *
    * @param AutenUsers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(AutenUsers $entity)
    {
        $form = $this->createForm(new AutenUsersType(), $entity, array(
            'action' => $this->generateUrl('auten_users_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AutenUsers entity.
     *
     * @Route("/new", name="auten_users_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AutenUsers();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AutenUsers entity.
     *
     * @Route("/{id}", name="auten_users_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeUserBundle:AutenUsers')->find($id);
	$entityrole = $em->getRepository('AcmeUserBundle:Role')->find($entity->getrole());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AutenUsers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity, 'entityrole'      => $entityrole,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AutenUsers entity.
     *
     * @Route("/{id}/edit", name="auten_users_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeUserBundle:AutenUsers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AutenUsers entity.');
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
    * Creates a form to edit a AutenUsers entity.
    *
    * @param AutenUsers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AutenUsers $entity)
    {
        $form = $this->createForm(new AutenUsersType(), $entity, array(
            'action' => $this->generateUrl('auten_users_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AutenUsers entity.
     *
     * @Route("/{id}", name="auten_users_update")
     * @Method("PUT")
     * @Template("AcmeUserBundle:AutenUsers:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeUserBundle:AutenUsers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AutenUsers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('auten_users_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AutenUsers entity.
     *
     * @Route("/{id}", name="auten_users_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeUserBundle:AutenUsers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AutenUsers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('auten_users'));
    }

    /**
     * Creates a form to delete a AutenUsers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('auten_users_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
