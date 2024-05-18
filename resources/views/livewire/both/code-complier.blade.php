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

        <h1>Output</h1>
        <div class="output">
            <pre>{{ $output }}</pre>
        </div>
    </div>
</div>
