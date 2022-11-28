<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:content="http://purl.org/rss/1.0/modules/content/">
  
  <channel>
    <title>Onicha Ado Dialect</title>
    <itunes:owner>
        <itunes:email>blass@blendedlearningcenter.com</itunes:email>
    </itunes:owner>
    <itunes:author>Blended Learning and Study Center</itunes:author>
    <description> Learn the Onicha Ado Dialect of the Igbo Language </description>
    <itunes:image href="{{ asset('assets/podcast_logo.png') }}"/>
    <link> {{route('home')}} </link>

    <!-- Ops -->
    <itunes:category text="Society &amp; Culture">
      <itunes:category text="Language" />
    </itunes:category>
    <itunes:category text="Education">
      <itunes:category text="Education" />
    </itunes:category>

    <language>en-us</language>
    <itunes:block>no</itunes:block>
    <itunes:explicit>no</itunes:explicit>
    <copyright>&#169; 2022 - {{date('Y')}} BLSC</copyright>

    @foreach ($podcasts as $podcast)
    <item>
      <title> {{$podcast->title}} </title>
      <enclosure url="{{$podcast->url}}" type="audio/mpeg" length="26004388"/>

      <!-- Ops -->
      <description> <![CDATA[ {{$podcast->description}} ]]> </description>
      <guid isPermaLink="false"> {{$podcast->slug}} </guid>
      <itunes:duration> {{$podcast->duration}} </itunes:duration>
      <pubDate>{{ $podcast->updated_at->format('D, d M Y H:i:s +0000') }}</pubDate>
      <itunes:image href="{{ $podcast->image }}"/>
      <link> {{route('episode', $podcast->slug)}} </link>

      <!-- Incase -->
      <itunes:block> {{$podcast->block}} </itunes:block>
      <itunes:explicit> {{$podcast->explicit}} </itunes:explicit>
    </item>
    @endforeach
  </channel>

</rss>