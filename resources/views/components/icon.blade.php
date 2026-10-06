@props(['name'])
<svg {{ $attributes }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
@switch($name)
    @case('shield') <path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/> @break
    @case('home') <path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M10 20v-6h4v6"/> @break
    @case('cash') <rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="3"/><path d="M6 10v.01M18 14v.01"/> @break
    @case('briefcase') <rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V5a2 2 0 012-2h2a2 2 0 012 2v2"/><path d="M3 13h18"/> @break
    @case('car') <path d="M5 16l1.5-5.5A2 2 0 018.4 9h7.2a2 2 0 011.9 1.5L19 16"/><rect x="3" y="16" width="18" height="4" rx="1"/><path d="M7 20v1M17 20v1"/> @break
    @case('user') <circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"/> @break
    @case('graduation') <path d="M2 9l10-5 10 5-10 5-10-5z"/><path d="M6 11.5V16c0 1.5 3 3 6 3s6-1.5 6-3v-4.5"/> @break
    @case('building') <rect x="5" y="3" width="14" height="18" rx="1"/><path d="M9 7h2M13 7h2M9 11h2M13 11h2M9 15h2M13 15h2"/> @break
    @case('key') <circle cx="8" cy="15" r="4"/><path d="M11 12l9-9M16 7l3 3"/> @break
    @case('chart') <path d="M3 3v18h18"/><path d="M7 15l4-4 3 3 6-7"/> @break
    @case('file') <path d="M14 3H7a2 2 0 00-2 2v14a2 2 0 002 2h10a2 2 0 002-2V8l-5-5z"/><path d="M14 3v5h5M9 13h6M9 17h6"/> @break
    @case('clock') <circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/> @break
    @case('handshake') <path d="M3 12l4-4 4 1 3-2 5 4-4 5-3 1-4-2z"/><path d="M3 12l3 3M21 11l-2 2"/> @break
    @case('phone') <path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2z"/> @break
    @case('mail') <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/> @break
    @case('pin') <path d="M12 21s7-6.2 7-11a7 7 0 10-14 0c0 4.8 7 11 7 11z"/><circle cx="12" cy="10" r="2.5"/> @break
    @case('menu') <path d="M4 7h16M4 12h16M4 17h16"/> @break
    @case('leaf') <path d="M5 19c0-9 5-14 15-14 0 10-5 15-14 15"/><path d="M5 19c2-5 5-8 9-10"/> @break
    @case('dashboard') <rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/> @break
    @case('edit') <path d="M4 20h4L19 9l-4-4L4 16v4z"/> @break
    @default <circle cx="12" cy="12" r="9"/>
@endswitch
</svg>
