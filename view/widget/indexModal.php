<style>
    .modal-body{
        display: flex;
        flex-direction: column;
        height: 20rem;
        align-items: center;
        justify-content: center;
    }

    .modal-header{
        color: white;
        background-color: black;
    }



    .selector select, option{
        padding: 1rem;
        font-size: 1.5rem;
        font-weight: bold;
    }

    /* .confirm-btn{
        position: relative;
        margin-top: 2rem;
        border: none;
        background-color: #0057e4;
        width: 8rem;
        height: 3rem;
        font-size: 1.5rem;
        color: #ffffff;
    } */

    .selector{
        margin-top: 2rem;
    }

    @media (max-width: 720px) {


        .modal-body{
        display: flex;
        flex-direction: column;
        height: 15rem;
        align-items: center;
        justify-content: center;
     
    }

    .modal-header{
        color: white;
        background-color: black;
    }

    .selector select, option{
        font-size: 1rem;
        font-weight: bold;
    }

    .selector{
        margin-top: 2rem;
    }

    }
</style>


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">What kind of account you are creating?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <h3>Tell us your account type: </h3>
                <div class="selector">
                <select id="type" name="type">
                    <option value="manufacture">Manufacture
                        </option>
                    <option value="distributor">Distributors </option>
                    <option value="service">Services</option>
                </select>
                </div>
            
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                    style="background-color: #0057e4; border: none; height: 4rem; width: 6rem; font-size: 1.5rem;">Close</button>
                    <button class="confirm-btn" style="background-color: #0057e4; border: none; height: 4rem; width: auto; font-size: 1.5rem; color: #ffffff; border-radius: 0.4rem; padding: 1rem;" >Confirm</button>

            </div>

        </div>
    </div>
</div>