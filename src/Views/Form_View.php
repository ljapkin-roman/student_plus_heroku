<h3> Form for register </h3>
<?php
session_start();
if (isset($data['errors'])) {
    $errors = $data['errors'];
}
if (isset($data['data'])) {
    $data = $data['data'];
}

?>
<form action="/registration/validate" method="post">
    <p>
        <label for="first_name"> First name: </label>
        <input id="first_name" type='text' name="first_name"
            <?php if (isset($data['first_name'])) {
                print_r("value={$data['first_name']}");
            }
            ?>
               required>
    </p>
    <?php
    if (isset($errors['first_name'])) {
        print_r("<p> {$errors['first_name']} </p>");
    }
    ?>

    <p>
        <label for="last_name"> Last name: </label>
        <input id="last_name" type='text' name="last_name"

            <?php if (isset($data['last_name'])) {
                print_r("value={$data['last_name']}");
            }
            ?>
               required>

        <?php
        if (isset($errors['last_name'])) {
            print_r("<p> {$errors['last_name']} </p>");
        }
        ?>
    </p>


    <p>
        <label for="number_group"> Number group: </label>
        <input id="number_group" type='text' name="number_group"

            <?php if (isset($data['number_group'])) {
                print_r("value={$data['number_group']}");
            }
            ?>

               required>

        <?php
        if (isset($errors['number_group'])) {
            print_r("<p> {$errors['number_group']} </p>");
        }
        ?>
    </p>

    <p>
        <label for="sex"> Мужской </label>
        <input id="sex" name="sex" value="male" type="radio" checked>

        <label for="sex"> Женский </label>
        <input id="sex" name="sex" value="female" type="radio">

        <?php
        if (isset($errors['sex'])) {
            print_r("<p> {$errors['sex']} </p>");
        }
        ?>
    </p>

    <p>
        <label for="email"> Email: </label>
        <input type='email' name="email" id="email"

            <?php if (isset($data['email'])) {
                print_r("value={$data['email']}");
            }
            ?>

               required>

        <?php
        if (isset($errors['email'])) {
            print_r("<p> {$errors['email']} </p>");
        }
        ?>
    </p>

    <p>
        <label for="score"> Ball EGE: </label>
        <input type='number' name="score" id="score" min="100" max="277"

            <?php if (isset($data['score_ege'])) {
                print_r("value={$data['score_ege']}");
            }
            ?>
               required>

        <?php
        if (isset($errors['score_ege'])) {
            print_r("<p> {$errors['score_ege']} </p>");
        }
        ?>
    </p>

    <p>
        <label for="birthday"> Birthday </label>
        <input type="date" id="birthday" name="birthday"

            <?php if (isset($data['birthday'])) {
                print_r("value={$data['birthday']}");
            }
            ?>
               required>

        <?php
        if (isset($errors['birthday'])) {
            print_r("<p> {$errors['birthday']} </p>");
        }
        ?>
    </p>


    <p>
        <label for="citizen"> Житель города </label>
        <input id="citizen" name="citizen" value="local" type="radio" checked>

        <label for="citizen"> Иногородний </label>
        <input id="citizen" name="citizen" value="no local" type="radio">

        <?php
        if (isset($errors['citizen'])) {
            print_r("<p> {$errors['citizen']} </p>");
        }
        ?>
    </p>
    <input type='submit' value='Submit'>
</form>
<?php
print_r($_COOKIE);
?>
