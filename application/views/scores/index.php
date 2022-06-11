<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <br>
                <table class="table table-light table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID no.</th>
                            <th>Name</th>
                            <th>Manager ID</th>
                            <th>First Half (Score)</th>
                            <th>First Half (Survey)</th>
                            <th>Second Half (Score)</th>
                            <th>Second Half (Survey)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($scores as $post) : ?>
                            <tr class="alert" role="alert">
                                <th scope="row"><?= $post['id'] ?></th>
                                <td><?= $post['name'] ?></td>
                                <td><?= $post['manager_id'] ?></td>
                                <td><?= $post['first_half_score'] ?></td>
                                <td><?= $post['first_half_survey'] ?></td>
                                <td><?= $post['second_half_score'] ?></td>
                                <td><?= $post['second_half_survey'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>