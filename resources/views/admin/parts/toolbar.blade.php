<div class="toolbar p-3">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-3 welcome">
                Welcome: 
                @auth
                    {{var_dump($authUser)}}
                @endauth

            </div>
            <div class="col-2 logout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout
            </div>
        </div>
    </div>
</div>