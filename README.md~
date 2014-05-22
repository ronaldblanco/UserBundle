This is a bundles for entity autentication in Symfony 2.4.4.
The only thing you need to do if want to try it is make it run as a bundle in your symfony project and make the necesary changes in your app/config/security.yml file.

Ex:

security:
    encoders:
        #Symfony\Component\Security\Core\User\User: plaintext
        Acme\UserBundle\Entity\User: #plaintext
          algorithm: bcrypt

    role_hierarchy:
        ROLE_ADMIN:       ROLE_USER
        ROLE_SUPER_ADMIN: [ROLE_USER, ROLE_ADMIN, ROLE_ALLOWED_TO_SWITCH]

    providers:
        #in_memory:
         #   memory:
          #      users:
           #         user:  { password: userpass, roles: [ 'ROLE_USER' ] }
            #        admin: { password: adminpass, roles: [ 'ROLE_ADMIN' ] }
        administrators:
           entity: { class: AcmeUserBundle:User, property: username }

The entity User.php is for the autentication and AutenUsers.php is for the CRUD operations. Both are join to the same table.
