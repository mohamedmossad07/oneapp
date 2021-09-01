# OneApp Task docs

### Routes 
 * /auth/provider | admin/login.

        I made this route dynamic to allow provider or admin to login with the same view blade

* dashboard/admin.
    
        underneath this route admin can handel backend views
    
* dashboard/admin/providers | create.
    
       by this route admin can make crud operations on providers
       
 * /dashboard/provider.
     
        by this route provider can add max 5 locations      

 * /{user_name}.oneapp.
     
        by this route guest can list provider locations       
         

> I made this routes in insulated file admin.php to contain all backend routes.
     
