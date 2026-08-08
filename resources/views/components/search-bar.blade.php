@props([
    'placeholder' => 'Search courses, mentors...',
    'action' => '/search'
])

<form action="{{ $action }}" method="GET" class="sv-search-bar">
    <div class="search-input-wrapper">
        <i class="fas fa-search search-icon"></i>
        <input type="text" name="q" class="search-input" placeholder="{{ $placeholder }}" value="{{ request('q') }}">
        <button type="submit" class="search-btn">Search</button>
    </div>
</form>

<style>
.sv-search-bar {
    width: 100%;
    max-width: 500px;
}
.search-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 30px;
    padding: 4px 4px 4px 20px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}
.search-input-wrapper:focus-within {
    background: rgba(255, 255, 255, 0.1);
    border-color: #6C63FF;
    box-shadow: 0 0 0 4px rgba(108, 99, 255, 0.1);
}
.search-icon {
    color: #aaa;
    font-size: 16px;
}
.search-input {
    flex-grow: 1;
    background: transparent;
    border: none;
    color: #fff;
    padding: 8px 12px;
    font-size: 15px;
    outline: none;
}
.search-input::placeholder {
    color: #888;
}
.search-btn {
    background: linear-gradient(135deg, #6C63FF, #FF6584);
    color: white;
    border: none;
    border-radius: 24px;
    padding: 8px 20px;
    font-weight: 600;
    transition: all 0.3s ease;
}
.search-btn:hover {
    box-shadow: 0 4px 15px rgba(108, 99, 255, 0.4);
    transform: translateY(-1px);
}
</style>
