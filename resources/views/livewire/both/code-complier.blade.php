<div class="code_complier_container">
    {{--  Code Complier Livewire Blade --}}
    <div class="problem_block">
        <h1>Problem</h1>
        {{-- <p>{{ $problem }}</p> --}}
    </div>
    <div class="code_block">
        <button wire:click="runCode">Execute</button>
        <textarea wire:model="code"></textarea>
        {{-- <pre>{{ $output }}</pre> --}}
    </div>
    <div class="output_block">
        <h1>Argument</h1>
        {{-- <p>{{ $argument }}</p> --}}
        <input type="text" name="argument" id="argument" placeholder="Input Arguments ">
        <textarea wire:model="" placeholder="Stdin Arguments"></textarea>

        <div class="output_info">
            <h1>Output</h1>

            <div class="memory_info output_info_item">
                <h2>Memory</h2>
                <span>{{ $memory }}</span>
            </div>

            <div class="cpu_time output_info_item">
                <h2>CPU Time</h2>
                <span>{{ $cpuTime }}</span>
            </div>
        </div>
        <div class="output">
            <span>{{ $output }}</span>
        </div>
    </div>
</div>
