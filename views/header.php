<header class="container-fluid my-3">
    <div class="mx-2 bg-primary" style="height: 18vh;">
        <h1 class="h2 text-center fw-bold text-white">Search For Jobs!</h1>

        <div class="container bg-secondary my-3 p-3">
            <form action="./action/search_result.php" method="post" class="form-group d-flex">
                <input type="text" name="job_title" id="job_title" class="form-control w-75 mx-3" placeholder="Enter Job Title/Company Name">
                
                <input type="submit" value="Search" name="search_btn" class="btn btn-success w-25">
            </form>
        </div>
    </div>
</header>