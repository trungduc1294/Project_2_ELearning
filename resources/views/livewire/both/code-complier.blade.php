<div class="code_complier_container">
    {{--  Code Complier Livewire Blade --}}
    <div class="problem_block">
        <h1>Problem</h1>
        {{-- <p>{{ $problem }}</p> --}}
    </div>
    <div class="code_block">
        <div class="code_block_header">
            <div class="code_editor">
                <select wire:model="language">
                    <option value="0">Choose language</option>
                    <option value="python3">Python3</option>
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="java">Java</option>
                </select>

                <button id="submit">Run</button>
            </div>

        </div>
        {{-- <textarea wire:model="code" id="hidden_editor"></textarea> --}}

        <div id="editor" wire:ignore></div>
    </div>
    <div class="output_block">
        <h1>Argument</h1>
        <input type="text" name="argument" id="argument" placeholder="Input Arguments ">
        <textarea wire:model="" placeholder="Stdin Arguments"></textarea>

        <div class="output_info">
            <h1>Output</h1>

            {{-- <div class="memory_info output_info_item">
                <h2>Memory</h2>
                <span>{{ $memory }}</span>
            </div>

            <div class="cpu_time output_info_item">
                <h2>CPU Time</h2>
                <span>{{ $cpuTime }}</span>
            </div> --}}
        </div>
        <div class="output">
            <span>{{ $output }}</span>
        </div>
    </div>
</div>


@script
<script>
    window.addEventListener('editor:submit', (evt) => {
        console.log(evt.detail, evt);
        $wire.runCode(evt.detail);
    })
</script>
@endscript
