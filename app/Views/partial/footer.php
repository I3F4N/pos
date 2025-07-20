<?php

use Config\OSPOS;

?>

        </div>
    </div>

    <div id="footer">
        <div class="jumbotron push-spaces">
            <strong>
                <?= lang('Common.copyrights', [date('Y')]) ?> ·
                <a href="eandp.in" target="_blank"><?= "eandp.in" ?></a> ·
                <?= esc(config('App')->application_version) ?> -
                <a target="_blank" href="https://eandp.in<?= esc(config(OSPOS::class)->commit_sha1) ?>">
                    <?= esc(substr(config(OSPOS::class)->commit_sha1, 0, 6)); ?>
                </a>
            </strong>.
        </div>
    </div>
</body>

</html>
