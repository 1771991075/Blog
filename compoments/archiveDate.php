<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$archiveDates = $redis->smembers("archivelist");
?>

<div class="card mb-3" style="max-width: 18rem;">
    <div class="card-header">
        <a>
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg>&nbsp;&nbsp;Archive
        </a>
    </div>
    <div class="card-body text-secondary">

        <div>
            <?php for ($i = 0; $i < count($archiveDates); $i++) { ?>

                <a href="/home/link.php?archiveDate=<?php echo $archiveDates[$i] ?>" class="btn btn-primary mt-1 mb-1 me-2" style="float:left background-color:#0d6efd">
                    <?php echo $archiveDates[$i] ?>
                    <span class="badge bg-secondary"><?php echo $redis->llen("archive-" . $archiveDates[$i]) ?>
                    </span>
                </a>
            <?php } ?>
        </div>

    </div>
</div>