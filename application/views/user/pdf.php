<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf Report</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/swiper.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/styles.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/w3.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Favicon  -->
    <link rel="icon" href="<?= base_url(); ?>assets/images/logo.png">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="text-center">Response Table of Students</h4> 
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Paper ID</th>
                            <th>Student ID</th>
                            <th>Question ID</th>
                            <th>Answer</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $paper): ?>
                            <tr>
                                <td scope="row"><?= $paper->id ?></td>
                                <td><?= $paper->paper_id ?></td>
                                <td><?= $paper->student_id ?></td>
                                <td><?= $paper->question_id ?></td>
                                <td><?= $paper->answer ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>