<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>WTL</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/bootstrap/bootstrap.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/themify-icons/themify-icons.css">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/animate/animate.css">
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/aos/aos.css">
    <!-- venobox popup -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/venobox/venobox.css">

    <!-- Main Stylesheet -->
    <link href="{{ asset('template') }}/css/style.css" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('template') }}/images/logo-wtl.png" type="image/x-icon">
    <link rel="icon" href="{{ asset('template') }}/images/logo-wtl.png" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.4/vue.js'></script>
    <style>
        @import "https://fonts.googleapis.com/css?family=Roboto";

        .step-wrapper {
            padding: 20px 0;
            display: none;
        }

        .step-wrapper.active {
            display: block;
        }

        .step-indicator {
            border-collapse: separate;
            display: table;
            margin-left: 0px;
            position: relative;
            table-layout: fixed;
            text-align: center;
            vertical-align: middle;
            padding-left: 0;
            padding-top: 20px;
        }

        .step-indicator li {
            display: table-cell;
            position: relative;
            float: none;
            padding: 0;
            width: 1%;
        }

        .step-indicator li:after {
            background-color: #ccc;
            content: "";
            display: block;
            height: 1px;
            position: absolute;
            width: 100%;
            top: 32px;
        }

        .step-indicator li:after {
            left: 50%;
        }

        .step-indicator li:last-child:after {
            display: none;
        }

        .step-indicator li.active .step {
            border-color: #434cd4;
            color: #434cd4;
        }

        .step-indicator li.active .caption {
            color: #434cd4;
        }

        .step-indicator li.complete:after {
            background-color: #434cd4;
        }

        .step-indicator li.complete .step {
            border-color: #434cd4;
            color: #434cd4;
        }

        .step-indicator li.complete .caption {
            color: #434cd4;
        }

        .step-indicator .step {
            background-color: #fff;
            border-radius: 50%;
            border: 1px solid #ccc;
            color: #ccc;
            font-size: 24px;
            height: 64px;
            line-height: 64px;
            margin: 0 auto;
            position: relative;
            width: 64px;
            z-index: 1;
        }

        .step-indicator .step:hover {
            cursor: pointer;
        }

        .step-indicator .caption {
            color: #ccc;
            padding: 11px 16px;
        }
    </style>

</head>

<body style="background-color: #ebf1ff">
    <header class="">
        <!-- top header -->
        <section>
            <div class="top-header py-2" style="margin: 20px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-5">
                                    <p class="mb-50"><a href="/beranda">
                                            < Kembali</a>
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <p class="h2 section-title text-dark">DAFTAR</p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <img src="{{ asset('template') }}/images/logo-wtl.png" alt=""
                                        style=" width:100px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <form method="POST" action="{{ route('isidata-proses') }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div id="app">
                <step-navigation :steps="steps" :currentstep="currentstep">
                </step-navigation>

                <div v-show="currentstep == 1">
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                                <input type="text" id="nik" name="nik" class="form-control"
                                    aria-describedby="nik" placeholder="Masukkan NIK">
                            </div>
                            {{-- <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" value="{{ Session::get('name')}}"
                                    aria-describedby="namalengkap" placeholder="Masukkan Nama" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ Session::get('email')}}" class="form-control" aria-describedby="email"
                                    placeholder="Masukkan email" disabled>
                            </div> --}}
                            <div class="form-group">
                                <label for="nohp">No. Hp</label>
                                <input type="number" name="nohp" class="form-control" aria-describedby="nohp"
                                    placeholder="Masukkan No. Hp">
                            </div>
                            <div class="form-group">
                                <label for="umur">Umur</label>
                                <input type="number" name="umur" class="form-control" aria-describedby="umur"
                                    placeholder="Masukkan Umur">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="textarea">Alamat KTP</label>
                                <textarea class="form-control" name="alamatktp" id="alamatktp" style="height: 170px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="textarea">Alamat Domisili</label>
                                <textarea class="form-control" id="alamatdomisili" name="alamatdomisili" style="height: 170px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="currentstep == 2">
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="file">Upload Pas Foto Background Merah</label>
                                <input type="file" class="form-control" id="pasfoto" name="pasfoto"
                                    aria-describedby="fileHelp">
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Scan Fotokopi Ijazah Terakhir / SKL</label>
                                <input type="file" class="form-control" id="ijazah" name="ijazah"
                                    aria-describedby="fileHelp">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="file">Upload Scan Fotokopi KTP</label>
                                <input type="file" class="form-control" id="ktp" name="ktp"
                                    aria-describedby="fileHelp">
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Scan Surat Keterangan Domisili Kelurahan</label>
                                <input type="file" class="form-control" id="skd" name="skd"
                                    aria-describedby="fileHelp">
                                <small class="form-text text-muted">*Jika Alamat KTP berbeda dengan Alamat
                                    Domisili</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div v-show="currentstep == 3">
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Masukkan Password">
                            </div>
                        </div> --}}
                        {{-- <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Konfirmasi Password</label>
                                <input type="password" id="password2" name="password2" class="form-control"
                                    placeholder="Masukkan Password">
                            </div>
                        </div> --}}
                    {{-- </div>
                </div> --}}

                <step v-for="step in steps" :currentstep="currentstep" :key="step.id" :step="step"
                    :stepcount="steps.length" @step-change="stepChanged">
                </step>

                {{-- js --}}
                <script type="x-template" id="step-navigation-template">
                    <ol class="step-indicator">
                        <li v-for="step in steps" is="step-navigation-step" :key="step.id" :step="step" :currentstep="currentstep">
                        </li>
                    </ol>
                </script>

                <script type="x-template" id="step-navigation-step-template">
                    <li :class="indicatorclass">
                        <div class="step"><i :class="step.icon_class"></i></div>
                        <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
                    </li>
                </script>

                <script type="x-template" id="step-template">
                    <div class="step-wrapper" :class="stepWrapperClass">
                        <div class="row">
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-primary" @click="lastStep" :disabled="firststep" style="width: 100%;">
                                    Kembali
                                </button>
                            </div>
                            <div class="col-lg-4 text-right mb-20">
                                <button type="button" class="btn btn-primary" @click="nextStep" :disabled="laststep" style="width: 100%;">
                                    Berikutnya
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary" v-if="laststep" style="width: 100%;">
                                    Simpan
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <p class="text-center">Sudah Punya Akun? <a href="/login">Login</a></p>
                            </div>
                        </div>
                    </div>
                </script>
            </div>
        </div>

    </form>

    <script>
        Vue.component("step-navigation-step", {
            template: "#step-navigation-step-template",

            props: ["step", "currentstep"],

            computed: {
                indicatorclass() {
                    return {
                        active: this.step.id == this.currentstep,
                        complete: this.currentstep > this.step.id
                    };

                }
            }
        });



        Vue.component("step-navigation", {
            template: "#step-navigation-template",

            props: ["steps", "currentstep"]
        });


        Vue.component("step", {
            template: "#step-template",

            props: ["step", "stepcount", "currentstep"],

            computed: {
                active() {
                    return this.step.id == this.currentstep;
                },

                firststep() {
                    return this.currentstep == 1;
                },

                laststep() {
                    return this.currentstep == this.stepcount;
                },

                stepWrapperClass() {
                    return {
                        active: this.active
                    };

                }
            },


            methods: {
                nextStep() {
                    this.$emit("step-change", this.currentstep + 1);
                },

                lastStep() {
                    this.$emit("step-change", this.currentstep - 1);
                }
            }
        });



        new Vue({
            el: "#app",

            data: {
                currentstep: 1,

                steps: [{
                        id: 1,
                        title: "Isi Data Diri",
                        icon_class: "fa fa-user"
                    },

                    {
                        id: 2,
                        title: "Upload Berkas",
                        icon_class: "fa fa-upload"
                    },

                    // {
                    //     id: 3,
                    //     title: "Atur Password",
                    //     icon_class: "fa fa-lock"
                    // }
                ]
            },




            methods: {
                stepChanged(step) {
                    this.currentstep = step;
                }
            }
        });
    </script>
    {{-- /js --}}

</body>

</html>
