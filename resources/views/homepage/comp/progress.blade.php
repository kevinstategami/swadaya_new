<div id="progress" class="pt75">
     <!-- SVG Cart Area -->
    <div class="container">
        
        <!-- title and short description start -->
        <div class="row">
            @if(!Auth::guest() && Auth::user()->edit_mode)
            <div class="col-md-12">
                <a href="javascript:void(0)" class="button button-md button-pasific" onclick="editSecaraUmum()">Ubah <span class="fa fa-cog"></span></a>
            </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    <small class="heading heading-icon heading-icon-rounded bg-grad-day-tripper center-block">
                        <i class="fa fa-trophy color-light"></i>
                    </small>
                    <small>Secara Umum</small>
                    Swadaya Utama
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>

            <div class="col-md-8 col-md-offset-2 secara-umum">
                <p class="lead w-50">
                    {{$progress['secara_umum']['description']}}
                </p>
            </div>
        </div>
        <!-- title and short description end -->
    </div>
            
    <div class="svg-container2">
        <!-- svg start -->
        <svg id="svgLine" xmlns="http://www.w3.org/2000/svg" version="1.1" 
             width="100%" height="300" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 2000 250" preserveAspectRatio="xMinYMax">

            <line x1="0" y1="90" x2="2500" y2="90" style="stroke:rgb(92,184,92);stroke-width:2" />                       

            @foreach($progress['sejarah'] as $key => $sejarah)
                @if($key % 2 != 1)
                    <text x="400" y="150" fill="#8b949b" style="font-size: 120%; font-weight: 400;">
                        {{$sejarah['description']}}
                    </text>
                    <text x="660" y="60" fill="#5cb85c" style="font-size: 250%; font-weight: 300;">{{$sejarah['title']}}</text>
                @else
                    <text x="1150" y="10" fill="#8b949b" style="font-size: 120%; font-weight: 400;">
                        <?php 
                            $description = $sejarah['description'];
                            $length = strlen($description);

                            $split = ($length - ($length % 60)) / 60;
                            $sisa = $length % 60;

                            $join = $split + ($sisa > 0 ? 1 : 0);

                            $resultText = array();
                            $subsValue = 0;
                            for ($i = 0; $i < $join; $i++) {
                                $text = substr($description, ($subsValue > 0 ? $subsValue + 1 : $subsValue), 61);
                                $subsValue += 61;

                                array_push($resultText, $text);
                            }
                        ?>
                        @foreach($resultText as $texts)
                        <tspan x="1150" dy="1.2em">
                            {{$texts}}
                        </tspan>
                        @endforeach
                    </text>
                    <text x="1360" y="150" fill="#5cb85c" style="font-size: 250%; font-weight: 300;">{{$sejarah['title']}}</text>
                @endif
            @endforeach
            <!-- <text x="1100" y="60" fill="#8b949b" style="font-size: 120%; font-weight: 400;">
                koperasi yang pertama di Tasikmalaya. Ditetapkan sebagai Hari Koperasi Indonesia.
            </text> -->

            <ellipse id="svg_3" rx="15" ry="15" cx="700" cy="90" fill="#b2cc71" stroke="#ffffff" stroke-width="5"></ellipse>
            <ellipse id="svg_5" rx="15" ry="15" cx="1400" cy="90" fill="#1abc9c" stroke="#ffffff" stroke-width="5"></ellipse>

        </svg>
        <!-- svg end -->
    </div><!-- svg container end -->
</div>