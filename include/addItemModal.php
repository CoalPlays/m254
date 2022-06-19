<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modalAddItem" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-lg rounded-5 shadow">
            <div class="modal-header pl-5 pr-5 pt-5 border-bottom-0">
                <h2 class="fw-bold mb-0">Add Item</h2>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pl-5 pr-5">
                <form action="addItem.php" method="POST" id="addItemForm">
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="product" class="form-control rounded-4 mx-2" maxlength="90" required>
                                <label>Produkt</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" name="owner" class="form-control rounded-4 mx-2" maxlength="80" required>
                                <label>Besitzer</label>
                            </div>
                        </div>
                        <div class="col-md d-flex flex-row">
                            <div class="form-floating d-flex flex-row">
                                <label class="mx-2">Defekt?</label>
                                <input type="checkbox" name="defect" class="align-self-center" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3 col-md-12 d-flex flex-row justify-content-center">



                    </div>
                    <div class="form-floating mb-3 col-md-12 d-flex flex-row">
                        <textarea name="place" style="height: 300px;" class="form-control rounded-4" maxlength="180" required cols="30" rows="10"></textarea>
                        <label>Ort</label>
                    </div>
                    <div class="form-floating mb-3 col-md-12 d-flex flex-row">
                        <input type="number" name="serialNumber" class="form-control rounded-4 mx-2" max="9999999999999999999999999" required>
                        <label>Seriennummer</label>
                    </div>

                </form>
            </div>
            <div class="modal-footer pl-5 pr-5 pb-5" style="border-top: 0 none;">
                <div class="col text-center ">
                    <button class="w-50 btn-lg rounded-4 btn-warning btn" name="addItemForm" form="addItemForm" type="submit">Add new item</button>
                </div>
            </div>
        </div>

    </div>
</div>