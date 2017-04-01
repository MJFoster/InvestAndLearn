<div>
    <form method="POST" action="LoginHandler.php">
        <div class="form-inputs">
            <label for="userEmail" class="required">* User Email:  </label>  <!-- TODO : With CSS, Add '*' just before of all 'required' class elements and remove hard code. -->
            <input id="user-email" type="email" placeholder="Enter Email " name="userEmail" required>
            <label for="user-password" class="required">* Password:  </label>
            <input id="user-password" type="text" placeholder="Enter Password" name="userPassword" required>
            <input type="submit">
        </div>
    </form>
</div>