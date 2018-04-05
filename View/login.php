<h2>Formulaire de connection </h2>
    <hr>
    <form name="form" action="index.php?ctrl=user&action=doLogin" method="post">
        <div class="form-group">
        <table width="500px">
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
                 <td colspan="2" style="text-align:center">
                     <input name="submitLogin" type="submit" value="Submit"> 
                 </td>
             </tr>
        </table>
        </div>
    </form>

<p>Not member yet ? <a href="index.php?ctrl=user&action=create">Subscribe !</a> </p>