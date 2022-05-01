<x-client.layout>
    @if (isset($data))
    <pre>
    @php print_r($data) @endphp
    </pre>
    @endif
</x-client.layout>
