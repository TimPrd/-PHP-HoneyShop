
<div class="container">
        <h2>Formulaire d'inscription</h2>
        <hr>
        <form name="form" method="post" action="index.php?ctrl=user&action=doCreate">
            <div class="form-group">
            <table width="500px">
                <tr>
                    <td valign="top">
                        <label for="first_name">First Name *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="first_name" maxlength="45" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <label for="last_name">Last Name *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="last_name" maxlength="45" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <label for="email">Email Address *</label>
                    </td>
                    <td valign="top">
                        <input  type="email" name="email" maxlength="45" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <label for="password">Password *</label>
                    </td>
                    <td valign="top">
                        <input  type="password" name="password" maxlength="300" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <label for="address">Address *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="address" maxlength="45" size="30" required>
                    </td>
                </tr>


                 <tr>
                    <td valign="top">
                        <label for="postalcode">Postalcode *</label>
                    </td>
                    <td valign="top">
                        <input  type="number" name="postalcode" maxlength="5" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <label for="city">City *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="city" maxlength="80" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td valign="top">
                        <label for="country">Country *</label>
                    </td>
                    <td valign="top">
                        <input  type="text" name="country" maxlength="80" size="30" required>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align:center">
                        <input name="submitCreate" type="submit" value="Submit"> 
                    </td>
                </tr>
            </div>
            </table>
        </form>
        </div>