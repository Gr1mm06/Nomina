<template>
    <main>
        <nav class="navbar navbar-expand-lg bg-light bg-primary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link
                                exact-active-class="active"
                                to="/"
                                class="nav-link active"
                                aria-current="page">
                                Inicio
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            <router-view>

            </router-view>
        </div>
    </main>
</template>
