<div class="code_complier_container">
    {{--  Code Complier Livewire Blade --}}
    <div class="problem_block">
        <h1>Problem</h1>
        {{-- <p>{{ $problem }}</p> --}}
    </div>
    <div class="code_block">
        <div class="code_block_header">
            {{-- <form wire:submit.prevent='runCode' class="language_select"> --}}
            {{-- <form class="code_editor"> --}}
                <select wire:model="language">
                    <option value="0">Choose language</option>
                    <option value="python3">Python3</option>
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="java">Java</option>
                    <option value="php">PHP</option>
                    <option value="ruby">Ruby</option>
                    <option value="nodejs">Nodejs</option>
                    <option value="scala">Scala</option>
                    <option value="kotlin">Kotlin</option>
                    <option value="swift">Swift</option>
                </select>

                <button type="submit" id="submit" onclick="execute()">Execute</button>
            {{-- </form> --}}

        </div>
        {{-- <textarea wire:model="code" id="code"></textarea> --}}
        <div id="editor"></div>
        {{-- <pre>{{ $output }}</pre> --}}
    </div>
    <div class="output_block">
        <h1>Argument</h1>
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


<script src="{{ asset('editor.bundle.js') }}"></script>
