@extends('layouts.app')

@section('title', ($currentTopic['title'] ?? 'Tutorial') . ' - ' . ($currentLang['name'] ?? 'Language') . ' | SkillVerse')

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
                                        <i class="fa-solid fa-chevron-right me-2 opacity-50" style="font-size: 0.7rem;"></i>
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
        <div class="col-lg-9 col-xl-10 bg-dark py-4 px-4 px-md-5 text-white">
            <!-- Top Reader Header & Navigation -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-secondary border-opacity-25">
                <div>
                    <h1 class="display-6 fw-bold text-white mb-2">{{ $currentTopic['title'] ?? 'Tutorial Topic' }}</h1>
                    <p class="lead text-muted mb-0">{{ $currentTopic['desc'] ?? 'Comprehensive explanation and practical coding guide.' }}</p>
                </div>
                <div class="d-flex gap-2">
                    @if($prevTopic)
                        <a href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $prevTopic['slug']) }}" class="btn btn-outline-secondary rounded-pill px-3">
                            <i class="fa-solid fa-arrow-left me-2"></i> Previous
                        </a>
                    @endif
                    @if($nextTopic)
                        <a href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $nextTopic['slug']) }}" class="btn btn-success rounded-pill px-4" style="background-color: #04AA6D; border-color: #04AA6D;">
                            Next <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- BOOTSTRAP VERSION SELECTOR CARDS (If viewing Bootstrap) -->
            @if(strtolower($currentLang['code']) === 'bootstrap' && in_array($currentTopic['slug'] ?? '', ['versions', 'introduction', 'b5-intro']))
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 text-white text-center p-4 shadow-lg border-0" style="background: linear-gradient(135deg, #563d7c, #452b69); border-radius: 20px;">
                        <div class="display-1 fw-bold mb-3">B3</div>
                        <a href="{{ url('/tutorials/bootstrap/versions') }}" class="btn btn-outline-light rounded-pill px-4 py-2 mb-3 fw-bold">Learn Bootstrap 3 &raquo;</a>
                        <p class="small text-white opacity-75">Bootstrap 3 is the stable legacy version of Bootstrap, supported for existing legacy web projects.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-white text-center p-4 shadow-lg border-0" style="background: linear-gradient(135deg, #6c5195, #553c7a); border-radius: 20px;">
                        <div class="display-1 fw-bold mb-3">B4</div>
                        <a href="{{ url('/tutorials/bootstrap/versions') }}" class="btn btn-outline-light rounded-pill px-4 py-2 mb-3 fw-bold">Learn Bootstrap 4 &raquo;</a>
                        <p class="small text-white opacity-75">Bootstrap 4 is a newer version of Bootstrap; featuring modern flexbox components and enhanced responsiveness.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 text-white text-center p-4 shadow-lg border-0" style="background: linear-gradient(135deg, #7952b3, #6639a6); border-radius: 20px;">
                        <div class="display-1 fw-bold mb-3">B5</div>
                        <a href="{{ url('/tutorials/bootstrap/b5-intro') }}" class="btn btn-light rounded-pill px-4 py-2 mb-3 fw-bold text-dark">Learn Bootstrap 5 &raquo;</a>
                        <p class="small text-white opacity-90">Bootstrap 5 is the <strong>newest version of Bootstrap</strong>; featuring smooth component updates and vanilla JavaScript.</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Tutorial Content Body -->
            <div class="tutorial-body mb-5" style="line-height: 1.8; font-size: 1.05rem;">
                <div class="card bg-darker border-secondary border-opacity-25 p-4 rounded-4 mb-4">
                    <h4 class="fw-bold text-primary mb-3"><i class="fa-solid fa-lightbulb me-2"></i> What is {{ $currentTopic['title'] ?? 'this topic' }}?</h4>
                    <p class="text-light opacity-90">
                        {{ $currentTopic['title'] }} is an essential topic in {{ $currentLang['name'] }}. Learning this allows you to build clean, efficient, and professional applications.
                    </p>
                    <ul class="text-light opacity-90 mb-0">
                        <li class="mb-2"><strong>Core Concept:</strong> Provides basic structure, control, and functional execution for {{ $currentTopic['title'] }}.</li>
                        <li class="mb-2"><strong>Industry Standard:</strong> Adopted by software engineers worldwide.</li>
                        <li><strong>Performance:</strong> Fast execution, zero overhead, and clean syntax.</li>
                    </ul>
                </div>

                <!-- Topic Code Example Card with Interactive Runner -->
                <div class="card bg-darker border border-primary border-opacity-50 rounded-4 overflow-hidden mb-5 shadow-lg">
                    <div class="card-header bg-dark border-bottom border-secondary border-opacity-25 py-3 d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-white"><i class="fa-solid fa-code text-primary me-2"></i> {{ $currentTopic['title'] }} Code Example</span>
                        <button class="btn btn-sm btn-success rounded-pill px-3 fw-bold" onclick="openTryItModal()" style="background-color: #04AA6D; border: none;">
                            <i class="fa-solid fa-play me-1"></i> Try It Yourself
                        </button>
                    </div>
                    <div class="card-body bg-darkest p-4">
                        <pre class="mb-0 text-success font-monospace" style="font-size: 1rem;"><code id="sampleCodeSnippet">{{ $topicContent['code'] }}</code></pre>
                    </div>
                </div>

                <!-- Topic Interactive Exercise Section -->
                <div class="card bg-darker border-secondary border-opacity-25 p-4 rounded-4 mb-5">
                    <h4 class="fw-bold text-warning mb-3"><i class="fa-solid fa-dumbbell me-2"></i> Interactive Exercise: {{ $currentTopic['title'] }}</h4>
                    <p class="text-light opacity-90 mb-3">{{ $topicContent['question'] }}</p>
                    
                    <div class="bg-dark p-3 rounded-3 mb-3 font-monospace">
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                            <span class="text-info">{{ $topicContent['prefix'] }}</span>
                            <input type="text" id="exerciseAnswer" class="form-control form-control-sm text-success bg-darker border-primary text-center font-monospace" style="width: 160px;" placeholder="Fill blank">
                            <span class="text-info">{{ $topicContent['suffix'] }}</span>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-primary rounded-pill px-4 fw-medium" onclick="checkExerciseAnswer()"><i class="fa-solid fa-check me-2"></i>Submit Answer</button>
                        <span id="exerciseFeedback" class="fw-bold"></span>
                    </div>
                </div>
            </div>

            <!-- Bottom Reader Navigation Buttons -->
            <div class="d-flex justify-content-between align-items-center pt-4 border-top border-secondary border-opacity-25">
                @if($prevTopic)
                    <a href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $prevTopic['slug']) }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="fa-solid fa-arrow-left me-2"></i> Previous Topic
                    </a>
                @else
                    <div></div>
                @endif

                @if($nextTopic)
                    <a href="{{ url('/tutorials/' . $currentLang['code'] . '/' . $nextTopic['slug']) }}" class="btn btn-success rounded-pill px-5 fw-bold" style="background-color: #04AA6D; border-color: #04AA6D;">
                        Next Topic <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
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

function scrollSubNav(amount) {
    const container = document.getElementById('languageScrollContainer');
    if (container) {
        container.scrollBy({ left: amount, behavior: 'smooth' });
    }
}

function openTryItModal() {
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

function checkExerciseAnswer() {
    const input = document.getElementById('exerciseAnswer').value.trim();
    const feedback = document.getElementById('exerciseFeedback');
    
    if (input.toLowerCase() === expectedAnswer.toLowerCase()) {
        feedback.className = 'fw-bold text-success ms-3';
        feedback.innerHTML = '<i class="fa-solid fa-circle-check me-1"></i> Correct! Excellent job (100% Topic Mastery)!';
    } else {
        feedback.className = 'fw-bold text-danger ms-3';
        feedback.innerHTML = '<i class="fa-solid fa-circle-xmark me-1"></i> Incorrect. Expected answer: <code>' + expectedAnswer + '</code>';
    }
}
</script>
@endsection
