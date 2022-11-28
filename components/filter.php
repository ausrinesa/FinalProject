<div class="box" id='filterForm'>
    <div class="d-flex flex-row  mb-3">
        <form class="row g-3" method="GET">

            <div class="col-lg-3">

                <input type="number" class="form-control filter" placeholder="people: min" name="peopleFrom">
            </div>
            <div class="col-lg-3">
                <input type="number" class="form-control filter" placeholder="people: max" name="peopleTo">

            </div>


            <div class="col-lg-2">

                <select class="form-select form-control filter" aria-label="Default select example" name="sort">
                    <option selected value="0"> Sort </option>
                    <option value="1"> distance: low to high </option>
                    <option value="2"> distance: high to low </option>
                </select>

            </div>

            <div class="col-lg-3">

                <select class="form-select form-control filter" name="withAnimals" aria-label="Default select example"
                    id="withAnimals">
                    <option value="" selected> Pets allowed </option>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>

            </div>


            <div class="col-lg-1 col-md-5 filter-input">
                <button type="submit" name="filter" class="btn btn-primary mb-3" id="filterBtn">Filter</button>
            </div>
    </div>
</div>

</form>
</div>