@extends('layouts.app')

@section('title', ($currentTopic['title'] ?? 'Tutorial') . ' - ' . ($currentLang['name'] ?? 'Language') . ' | SkillVerse')

@section('styles')
<style>
.color_h1 { color: #6C63FF; }
.nextprev { display: flex; justify-content: space-between; align-items: center; margin: 15px 0; }
.nextprev .btn-nextprev { background-color: #04AA6D; color: white; border-radius: 5px; font-weight: 600; padding: 8px 22px; text-decoration: none; border: none; }
.nextprev .btn-nextprev:hover { background-color: #059862; color: white; }
.nextprev .btn-prev { background-color: #334155; color: white; border-radius: 5px; font-weight: 600; padding: 8px 22px; text-decoration: none; border: none; }
.nextprev .btn-prev:hover { background-color: #475569; color: white; }

.w3-example { background-color: #1e293b; border-radius: 12px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #04AA6D; }
.w3-example-red { background-color: #1e293b; border-radius: 12px; padding: 20px; margin-bottom: 25px; border-left: 5px solid #ef4444; }
.w3-code { background-color: #0f172a; padding: 15px; border-radius: 8px; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.98rem; margin: 12px 0; color: #4ade80; }
.w3-code-red { background-color: #0f172a; padding: 15px; border-radius: 8px; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.98rem; margin: 12px 0; color: #f87171; border-left: 3px solid #ef4444; }
.w3-codeline { background-color: #0f172a; padding: 12px 18px; border-radius: 8px; font-family: 'Consolas', 'Courier New', monospace; font-size: 0.98rem; margin: 10px 0; color: #4ade80; }

.ws-note { background-color: #0284c7; color: white; padding: 16px 20px; border-radius: 10px; margin: 20px 0; font-weight: 500; }
.tryit-btn { background-color: #04AA6D; color: white; border: none; padding: 8px 18px; border-radius: 6px; font-weight: 600; text-decoration: none; display: inline-block; cursor: pointer; }
.tryit-btn:hover { background-color: #059862; color: white; }

#exercisecontainer { background-color: #1e293b; border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 25px; margin: 30px 0; }
.questionmark { display: inline-block; width: 24px; height: 24px; background-color: #3b82f6; color: white; border-radius: 50%; text-align: center; font-size: 14px; line-height: 24px; cursor: help; margin-left: 8px; }
.quizoption { background-color: #0f172a; padding: 12px 16px; border-radius: 8px; margin-bottom: 10px; border: 1px solid rgba(255,255,255,0.05); cursor: pointer; transition: all 0.2s; }
.quizoption:hover { border-color: #3b82f6; background-color: #1e293b; }
.quizoption input[type="radio"] { margin-right: 12px; transform: scale(1.2); }

.bookmark-btn { cursor: pointer; display: inline-flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; background: rgba(255,255,255,0.1); margin-right: 12px; transition: all 0.2s; }
.bookmark-btn:hover { background: rgba(108, 99, 255, 0.3); color: #6C63FF; }
.bookmark-btn.active { background: #6C63FF; color: white; }
</style>
@endsection

@section('content')
<!-- Horizontal Language Selector Bar -->
<div id="subtopnav" class="bg-dark text-white border-bottom border-secondary border-opacity-25 py-2 position-relative shadow-sm" style="overflow-x: hidden;">
    <div class="container-fluid d-flex align-items-center position-relative px-4">
        <!-- Left Arrow Scroll Button -->
        <button class="btn btn-sm text-white position-absolute start-0 z-2 bg-dark border-0 px-2 h-100" id="scroll_left_btn" onclick="scrollSubNav(-250)" style="box-shadow: 10px 0 10px rgba(0,0,0,0.5);">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <!-- Horizontal Language Links Bar -->
        <div class="d-flex align-items-center gap-1 overflow-x-auto text-nowrap py-1 px-3 w-100 no-scrollbar" id="languageScrollContainer" style="scroll-behavior: smooth; scrollbar-width: none; -ms-overflow-style: none;">
            @foreach($languages as $langItem)
                @php $isActive = (strtolower($langItem['code']) === strtolower($currentLang['code'])); @endphp
                <a href="{{ url('/tutorials/' . $langItem['code']) }}" class="btn btn-sm px-3 py-1 text-uppercase fw-bold rounded-pill text-decoration-none transition-all {{ $isActive ? 'text-white shadow-sm' : 'text-light opacity-75 hover-opacity-100' }}" style="{{ $isActive ? 'background: ' . ($langItem['color'] ?? '#6C63FF') . ' !important; font-weight: 700;' : 'background: rgba(255,255,255,0.05);' }}">
                    <i class="fa-brands {{ $langItem['icon'] }} me-1" style="color: {{ $isActive ? '#fff' : $langItem['color'] }};"></i>
                    {{ $langItem['name'] }}
                </a>
            @endforeach
        </div>

        <!-- Right Arrow Scroll Button -->
        <button class="btn btn-sm text-white position-absolute end-0 z-2 bg-dark border-0 px-2 h-100" id="scroll_right_btn" onclick="scrollSubNav(250)" style="box-shadow: -10px 0 10px rgba(0,0,0,0.5);">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</div>

<div class="container-fluid py-0">
    <div class="row g-0">
        <!-- Left Sidebar Topic Explorer -->
        <div class="col-lg-3 col-xl-2 bg-darker border-end border-secondary border-opacity-25 py-4 px-3 min-vh-100">
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom border-secondary border-opacity-25 px-2">
                <i class="fa-brands {{ $currentLang['icon'] }} fa-2x me-3" style="color: {{ $currentLang['color'] }};"></i>
                <div>
                    <h5 class="fw-bold text-white mb-0">{{ $currentLang['name'] }} Tutorial</h5>
                    <small class="text-primary fw-medium">Complete Tutorial</small>
                </div>
            </div>

            <div class="accordion accordion-flush" id="tutorialSidebarAccordion">
                @foreach($topicsTree as $categoryIndex => $catGroup)
                <div class="accordion-item bg-transparent border-0 mb-3">
                    <h2 class="accordion-header" id="heading-{{ $categoryIndex }}">
                        <button class="accordion-button bg-transparent text-white px-2 py-1 shadow-none fw-bold small text-uppercase" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $categoryIndex }}" aria-expanded="true" aria-controls="collapse-{{ $categoryIndex }}" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-folder-open text-primary me-2"></i> {{ $catGroup['category'] }}
                        </button>
                    </h2>
                    <div id="collapse-{{ $categoryIndex }}" class="accordion-collapse collapse show" aria-labelledby="heading-{{ $categoryIndex }}">
                        <div class="accordion-body p-0 pt-2">
                            <div class="list-group list-group-flush border-0">
                                @foreach($catGroup['items'] as $item)
                                    @php $isTopicActive = ($currentTopic['slug'] ?? '') === $item['slug']; @endphp
                                    <a href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $item['slug']) }}" class="list-group-item list-group-item-action bg-transparent border-0 px-3 py-2 rounded-2 small transition-all {{ $isTopicActive ? 'text-white bg-primary bg-opacity-25 fw-bold border-start border-primary border-3' : 'text-muted hover-text-white' }}">
                                        {{-- <i class="fa-solid fa-chevron-right me-2 opacity-50" style="font-size: 0.7rem;"></i> --}}
                                        {{ $item['title'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Main Tutorial Reader Area -->
        <div class="col-lg-9 col-xl-10 bg-dark py-4 px-4 px-md-5 text-white" id="main">
            
            <!-- Main Title Header with Bookmark -->
            <div class="d-flex align-items-center mb-3">
                <div id="bookmark-btn" class="bookmark-btn" title="Click to add bookmark" onclick="toggleBookmark(this)">
                    <i class="fa-regular fa-bookmark"></i>
                </div>
                <h1 class="h2 fw-bold text-white mb-0">
                    {{ $topicContent['lang_name'] }} - <span class="color_h1">{{ $topicContent['title'] }}</span>
                </h1>
            </div>

            <!-- Top Navigation Buttons -->
            <div class="nextprev border-bottom border-secondary border-opacity-25 pb-3">
                @if($prevTopic)
                    <a class="btn-prev" href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $prevTopic['slug']) }}">❮ Previous</a>
                @else
                    <div></div>
                @endif

                @if($nextTopic)
                    <a class="btn-nextprev" href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $nextTopic['slug']) }}">Next ❯</a>
                @endif
            </div>

            <!-- Core Topic Explanation Body -->
            <div class="tutorial-body my-4" style="line-height: 1.8; font-size: 1.05rem;">
                <h2 class="fw-bold text-white mb-3">{{ $topicContent['title'] }}</h2>
                <p class="lead text-light opacity-90">{{ $topicContent['intro_p'] }}</p>

                @if(!empty($topicContent['rules']))
                    <p class="fw-bold text-white mt-4 mb-2">{{ $topicContent['rules_header'] }}</p>
                    <ul class="text-light opacity-90 mb-4">
                        @foreach($topicContent['rules'] as $rule)
                            <li class="mb-2">{{ $rule }}</li>
                        @endforeach
                    </ul>
                @endif

                <!-- Example 1: Legal / Main Example -->
                @if(!empty($topicContent['example_legal']))
                    <div class="w3-example">
                        <h3 class="fw-bold text-white h4 mb-2">{{ $topicContent['example_legal']['title'] }}</h3>
                        <p class="text-light opacity-90 mb-2">{{ $topicContent['example_legal']['label'] }}</p>
                        <div class="w3-code">
                            <pre class="mb-0"><code>{!! e($topicContent['example_legal']['code']) !!}</code></pre>
                        </div>
                        <button class="tryit-btn" onclick="openTryItModal('{!! addslashes($topicContent['example_legal']['code']) !!}')">Try it Yourself »</button>
                    </div>
                @endif

                <!-- Example 2: Illegal / Error Example Box -->
                @if(!empty($topicContent['example_illegal']))
                    <div class="w3-example-red">
                        <h3 class="fw-bold text-danger h4 mb-2">{{ $topicContent['example_illegal']['title'] }}</h3>
                        <p class="text-light opacity-90 mb-2">{{ $topicContent['example_illegal']['label'] }}</p>
                        <div class="w3-code-red">
                            <pre class="mb-0"><code>{!! e($topicContent['example_illegal']['code']) !!}</code></pre>
                        </div>
                        <button class="btn btn-outline-danger btn-sm rounded-pill fw-bold px-3 mt-2" onclick="openTryItModal('{!! addslashes($topicContent['example_illegal']['code']) !!}')">Try it Yourself »</button>
                    </div>
                @endif

                <!-- Note Callout Box -->
                @if(!empty($topicContent['note']))
                    <div class="ws-note shadow-sm">
                        <p class="mb-0"><i class="fa-solid fa-circle-info me-2"></i> {{ $topicContent['note'] }}</p>
                    </div>
                @endif

                <!-- Subsections (Camel Case, Pascal Case, Snake Case, etc.) -->
                @if(!empty($topicContent['subsections']))
                    <hr class="border-secondary opacity-25 my-4">
                    <h2 class="fw-bold text-white mb-3">{{ $topicContent['subsections_header'] ?? 'Topic Variations' }}</h2>
                    <p class="text-light opacity-90 mb-4">{{ $topicContent['subsections_p'] ?? '' }}</p>

                    @foreach($topicContent['subsections'] as $sub)
                        <h3 class="fw-bold text-primary h5 mt-4 mb-2">{{ $sub['name'] }}</h3>
                        <p class="text-light opacity-90 mb-2">{{ $sub['desc'] }}</p>
                        <div class="w3-codeline">
                            <code>{!! e($sub['code']) !!}</code>
                        </div>
                        <hr class="border-secondary opacity-25 my-3">
                    @endforeach
                @endif

                <!-- Interactive Quiz Exercise Section -->
                @if(!empty($topicContent['quiz']))
                    <div id="exercisecontainer">
                        <h2 class="fw-bold text-white mb-3">
                            Exercise <span class="questionmark" title="Test your skills by answering a few questions about the topics of this page">?</span>
                        </h2>
                        <p class="text-light opacity-90 mb-3 fs-5">{{ $topicContent['quiz']['question'] }}</p>
                        
                        <form id="quizForm" onsubmit="submitQuizAnswer(event)">
                            @foreach($topicContent['quiz']['options'] as $opt)
                                <div class="quizoption" onclick="document.getElementById('quizoption{{ $opt['id'] }}').checked = true">
                                    <input type="radio" name="quizoption" id="quizoption{{ $opt['id'] }}" value="{{ $opt['id'] }}" required>
                                    <label for="quizoption{{ $opt['id'] }}" class="text-white font-monospace mb-0" style="cursor: pointer;">
                                        <code>{{ $opt['text'] }}</code>
                                    </label>
                                </div>
                            @endforeach
                            <button type="submit" class="tryit-btn mt-3 px-4 py-2" style="font-size: 1.05rem;">Submit Answer »</button>
                        </form>
                        <div id="quizResultFeedback" class="mt-3"></div>
                    </div>
                @endif

                <!-- Additional Fill-In-The-Blank Exercise -->
                <div class="card bg-darker border-secondary border-opacity-25 p-4 rounded-4 mb-4">
                    <h4 class="fw-bold text-warning mb-3"><i class="fa-solid fa-dumbbell me-2"></i> Fill-in-the-Blank Practice: {{ $currentTopic['title'] }}</h4>
                    <p class="text-light opacity-90 mb-3">{{ $topicContent['question'] }}</p>
                    
                    <div class="bg-dark p-3 rounded-3 mb-3 font-monospace">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="text-info">{{ $topicContent['prefix'] }}</span>
                            <input type="text" id="exerciseAnswer" class="form-control form-control-sm text-success bg-darker border-primary text-center font-monospace" style="width: 160px;" placeholder="Fill blank">
                            <span class="text-info">{{ $topicContent['suffix'] }}</span>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-primary rounded-pill px-4 fw-medium" onclick="checkExerciseAnswer()"><i class="fa-solid fa-check me-2"></i>Submit Blank</button>
                        <span id="exerciseFeedback" class="fw-bold"></span>
                    </div>
                </div>

                <!-- Video Tutorial Card -->
                @if(!empty($topicContent['video']))
                    <div class="p-4 rounded-4 text-center bg-darker mb-4 border border-secondary border-opacity-25" style="background-color:#1e293b;">
                        <h3 class="fw-bold text-white h4 mb-3"><i class="fa-brands fa-youtube text-danger me-2"></i> {{ $topicContent['video']['title'] }}</h3>
                        <a href="{{ $topicContent['video']['url'] }}" target="_blank" class="btn btn-danger rounded-pill px-4 py-2 fw-bold text-white text-decoration-none">
                            <i class="fa-solid fa-play me-2"></i> Watch Tutorial Video on YouTube
                        </a>
                    </div>
                @endif

                <!-- Track Progress Callout Bar -->
                <div class="card bg-darker border border-primary border-opacity-25 p-3 rounded-4 mb-4 text-center">
                    <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                        <span class="badge bg-success rounded-pill px-3 py-2 fs-6"><i class="fa-solid fa-star me-1"></i> +1 XP</span>
                        <span class="text-light">Sign in to track your learning progress across all topics!</span>
                        <a href="{{ url('/login') }}" class="btn btn-sm btn-outline-primary rounded-pill px-4 fw-bold">Sign In</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Navigation Buttons -->
            <div class="nextprev border-top border-secondary border-opacity-25 pt-4">
                @if($prevTopic)
                    <a class="btn-prev" href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $prevTopic['slug']) }}">❮ Previous</a>
                @else
                    <div></div>
                @endif

                @if($nextTopic)
                    <a class="btn-nextprev" href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $nextTopic['slug']) }}">Next ❯</a>
                @endif
            </div>

        </div>
    </div>
</div>

<!-- Interactive "Try It Yourself" Sandbox Modal -->
<div class="modal fade" id="tryItModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content bg-dark text-white border border-primary shadow-lg" style="border-radius: 16px;">
            <div class="modal-header bg-darker border-bottom border-secondary border-opacity-25 py-3">
                <h5 class="modal-title fw-bold text-white"><i class="fa-solid fa-laptop-code text-primary me-2"></i> SkillVerse Sandbox: {{ $currentTopic['title'] }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="fw-bold text-primary mb-2">Edit {{ $currentTopic['title'] }} Code:</label>
                        <textarea id="modalCodeEditor" class="form-control bg-darkest text-success font-monospace p-3 border-secondary" style="height: 380px; font-size: 0.95rem;">{{ $topicContent['code'] }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="fw-bold text-success mb-2">Live Output Window:</label>
                        <iframe id="codeOutputFrame" class="w-100 bg-white rounded border border-secondary" style="height: 380px;"></iframe>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-darker border-top border-secondary border-opacity-25 py-2 justify-content-between">
                <span class="text-muted small"><i class="fa-solid fa-bolt text-warning me-1"></i> Instant In-Browser Execution</span>
                <button type="button" class="btn btn-success rounded-pill px-4 fw-bold" onclick="runSandboxCode()" style="background-color: #04AA6D; border: none;">
                    <i class="fa-solid fa-play me-2"></i> Run Code
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const expectedAnswer = {!! json_encode($topicContent['answer']) !!};
const correctQuizIndex = {!! json_encode($topicContent['quiz']['correct_index'] ?? 0) !!};

function scrollSubNav(amount) {
    const container = document.getElementById('languageScrollContainer');
    if (container) {
        container.scrollBy({ left: amount, behavior: 'smooth' });
    }
}

function toggleBookmark(btn) {
    btn.classList.toggle('active');
    const icon = btn.querySelector('i');
    if (btn.classList.contains('active')) {
        icon.className = 'fa-solid fa-bookmark text-primary';
    } else {
        icon.className = 'fa-regular fa-bookmark';
    }
}

function openTryItModal(customCode) {
    if (customCode) {
        document.getElementById('modalCodeEditor').value = customCode;
    }
    var modal = new bootstrap.Modal(document.getElementById('tryItModal'));
    modal.show();
    setTimeout(runSandboxCode, 300);
}

function runSandboxCode() {
    const code = document.getElementById('modalCodeEditor').value;
    const iframe = document.getElementById('codeOutputFrame');
    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    iframeDoc.open();
    iframeDoc.write(code);
    iframeDoc.close();
}

function submitQuizAnswer(e) {
    e.preventDefault();
    const selected = document.querySelector('input[name="quizoption"]:checked');
    const feedback = document.getElementById('quizResultFeedback');
    
    if (!selected) return;

    if (parseInt(selected.value) === parseInt(correctQuizIndex)) {
        feedback.innerHTML = '<div class="alert alert-success border-0 rounded-3 font-semibold mb-0"><i class="fa-solid fa-circle-check me-2"></i> Correct! Excellent answer (+1 XP earned).</div>';
    } else {
        feedback.innerHTML = '<div class="alert alert-danger border-0 rounded-3 font-semibold mb-0"><i class="fa-solid fa-circle-xmark me-2"></i> Incorrect. Review the variable rules above and try again!</div>';
    }
}

function checkExerciseAnswer() {
    const input = document.getElementById('exerciseAnswer').value.trim();
    const feedback = document.getElementById('exerciseFeedback');
    
    if (input.toLowerCase() === expectedAnswer.toLowerCase()) {
        feedback.className = 'fw-bold text-success ms-3';
        feedback.innerHTML = '<i class="fa-solid fa-circle-check me-1"></i> Correct! Excellent job!';
    } else {
        feedback.className = 'fw-bold text-danger ms-3';
        feedback.innerHTML = '<i class="fa-solid fa-circle-xmark me-1"></i> Incorrect. Expected: <code>' + expectedAnswer + '</code>';
    }
}
</script>
@endsection
