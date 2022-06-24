<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalError" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-lg rounded-5 shadow">
            <div class="modal-header pl-5 pr-5 pt-5 border-bottom-0">
                <h2 style="color: red;" class="fw-bold mb-0">Error</h2>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            

            <div class="modal-body pl-5 pr-5">
                <?php
                if (isset($_GET['err'])) {
                    echo "<p style='color: red;' class='my-4'>{$_GET['err']}</p>";
                }
                ?>
            </div>

        </div>

    </div>
</div>