<form method="POST" action="#">     <!-- TODO : Add form handler to 'action' -->
    <div class="form-inputs">
        <label for="userName" class="required">* Name:  </label>  <!-- TODO : With CSS, Add '*' just before of all 'required' class elements and remove hard code. -->
        <input id="user-name" type="text" placeholder="Enter Name" name="userName" required>
        <label for="user-password" class="required">* Password:  </label>
        <input id="user-password" type="text" placeholder="Enter Password" name="userPassword" required>
        <input type="submit">
    </div>
</form>