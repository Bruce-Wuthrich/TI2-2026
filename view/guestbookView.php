<?php
# view/guestbookView.php
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TI2 | Livre d'or</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>
    <header>
        <h1>T12 | Livre d'or</h1>
        <img src="img/—Pngtree—creative writing book logo vector_23288471.png" alt="Illustration livre d'or" class="illustration">
        <button id="theme-toggle" class="theme-btn" title="Changer le thème">☀</button>
    </header>
    <main>
        <div class="form-section">
             
            <div class="form-container">
                <h2>Ici le formulaire</h2>
                <!-- feedback qui donne suces ou error -->
                <?php if (!empty($feedbackMessage)): ?>
                    <p class="feedback <?= $feedbackMessage['type'] === 'success' ? 'feedback--success' : 'feedback--error' ?>">
                        <?= htmlspecialchars($feedbackMessage['text']) ?>
                    </p>
                <?php endif; ?>
                <!--formulaire -->
                <form action="" method="post" id="guestbookForm" novalidate>

                    <div class="form-group">
                        <label for="firstname">Prénom *</label>
                        <input type="text" name="firstname" id="firstname"
                            value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>"
                            required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nom *</label>
                        <input type="text" name="lastname" id="lastname"
                            value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>"
                            required maxlength="100">
                    </div>

                    <div class="form-group">
                        <label for="usermail">E-mail *</label>
                        <input type="email" name="usermail" id="usermail"
                            value="<?= htmlspecialchars($_POST['usermail'] ?? '') ?>"
                            required maxlength="200">
                    </div>

                    <div class="form-group">
                        <label for="postcode">C./postal *</label>
                        <input type="text" name="postcode" id="postcode"
                            value="<?= htmlspecialchars($_POST['postcode'] ?? '') ?>"
                            required maxlength="4" pattern="\d{4}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Portable *</label>
                        <input type="text" name="phone" id="phone"
                            value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>"
                            required maxlength="20">
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <div class="textarea-wrapper">
                            <textarea name="message" id="message" rows="5"
                                required maxlength="500"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                            <span id="charCount" class="char-count">0 / 300 caractères</span>
                        </div>
                    </div>

                    <button type="submit">Envoyer</button>

                </form>
            </div>
        </div>
        <!-- Liste des messages -->
        <section class="messages-section">

            <h2>Les messages précédents</h2>

            <?php if ($nbMessages === 0): ?>
                <p class="nb-messages">Pas encore de message</p>
            <?php elseif ($nbMessages === 1): ?>
                <p class="nb-messages">Il y a 1 message</p>
            <?php else: ?>
                <p class="nb-messages">Il y a <?= $nbMessages ?> messages</p>
            <?php endif; ?>

            <?php if (!empty($paginationHtml)) echo $paginationHtml; ?>
            <!-- Autres messages -->
            <?php foreach ($messages as $msg): ?>
                <div class="message-card">
                    <p class="message-meta">
                        <?= htmlspecialchars($msg['firstname']) ?>
                        <?= htmlspecialchars($msg['lastname']) ?>
                        - <?= htmlspecialchars($msg['usermail']) ?>
                        a écrit ce message le
                        <?php
                        $date = new DateTime($msg['datemessage']);
                        echo 'Le (' . $date->format('d/m/Y') . ' à ' . $date->format('H\hi') . ')';
                        ?>
                    </p>
                    <p class="message-content"><?=(htmlspecialchars($msg['message'])) ?></p>
                </div>
            <?php endforeach; ?>


        </section>

    </main>
    <footer>
        <p>&copy; <?= date('Y') ?> TI2 | Livre d'or</p>
    </footer>
    <!-- Pagination (BONUS) -->

    <!-- Pagination (BONUS) -->
    <?php
    // À commenter quand on a fini de tester
   // echo "<h3>Nos var_dump() pour le débugage</h3>";
   // echo '<p>$_POST</p>';
   // var_dump($_POST);
   // echo '<p>$_GET</p>';
   // var_dump($_GET);
    ?>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/validation.js"></script>
</body>

</html>