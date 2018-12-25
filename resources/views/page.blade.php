@extends('layouts.app')


@section('content')
    <main class="position-relative pb-3 mt-3 mb-3">
        <div class="bg-white pb-4">

            <div class="bg-info vertical-line-center"></div>

            <div class="col-xs-12 col-md-12 col-sm-12">
                <h1>Stimulus 101: Building&nbsp;a&nbsp;Modal</h1>
            </div>

            <div class="position-relative bg-white">
                <img src="https://tighten.co/assets/img/blog/stimulus-101-building-a-modal-feature-image.png"
                     class="img-fluid" style="max-height: 350px; width: 100%;object-fit: cover">
            </div>


            <div class="position-relative bg-white pb-3 mb-3 pt-4">


                <p>Web developers have been adding interactivity to our web sites since JavaScript was introduced in
                   1995. For much of the last 20+ years, jQuery was <em>the</em> tool to use to add that interactivity.
                   jQuery is simple, and provides a standard API to directly manipulate DOM elements in any browser.
                   Then, in 2013, tools like React and Vue.js ushered in the era of the "virtual DOM," a representation
                   of the real DOM built with languages that (often) look like HTML but which, in actuality, are
                   JavaScript. Modifying the <em>real</em> DOM became blasphemous, something to be done as a last
                   resort.</p>

                <p>So when Basecamp announced <a href="https://stimulusjs.org/">Stimulus</a>, self-described as "a
                   modest JavaScript framework for the HTML you already have", the concept was somehow radical and
                   familiar at the same time. Stimulus doesn't just allow you to modify the real DOM, it embraces the
                   concept entirely.</p>

                <p>In this post we'll talk about Stimulus, how it differs from other modern JavaScript frameworks, and
                   how to use it to build a real on-page interaction--with the DOM you already have.</p>

                <h2>What's So Wrong with the&nbsp;Virtual&nbsp;DOM?</h2>

                <p>While the concept of the virtual DOM is undoubtedly clever, it has left those of us building
                   applications that render HTML directly from the server with tools like Laravel in a bit of a bind. If
                   we want to add even a little bit of interaction to our application, we must bend its structure to the
                   will of our virtual DOM framework.</p>

                <p>We're often left with two options: turn our server-side application into a JSON API whose sole
                   purpose is to be consumed by a single page application (SPA), or intersperse virtual DOM components
                   within our traditional HTML code. What we've traded often doesn't feel fair compared to what we
                   got.</p>

                <pre>
                    <code class="language-php" data-lang="php">
$storage = Cache::store('redis');
$experiment = new Experiment('my-key',$storage);

$ab = $experiment->start([
    'A' => 50,
    'B' => 100,
]); // A or B
                    </code>
                </pre>



                <p>Stimulus, unlike React and Vue.js, has no notion of a virtual DOM. Instead, it creates a bridge
                   between the real server-rendered DOM and JavaScript objects. Three core concepts are utilized to do
                   so: controllers, targets, and actions.</p>

                <ul>
                    <li><strong>Controllers</strong> are JavaScript classes that each map directly to an element in the
                                                     DOM. Controllers give you control over all the children inside
                                                     their matched element.
                    </li>
                    <li><strong>Targets</strong> are identifiers applied to DOM elements inside of controllers. Targets
                                                 allow you to reference these child elements by name within your
                                                 controllers.
                    </li>
                    <li><strong>Actions</strong> are methods on your controllers that will be fired in response to
                                                 certain events. For instance, an action might be fired when a user
                                                 clicks on a DOM element.
                    </li>
                </ul>

                <p>Don't worry if you didn't follow that completely; we're going to build something real that will help
                   make these concepts much clearer.</p>

                <h3>What We're Building</h3>

                <p>In this walkthrough, we're going to rebuild <a
                            href="https://getbootstrap.com/docs/4.1/components/modal/">Bootstrap 4's modal component</a>
                   using Stimulus. I recommend that you take a brief moment to read through Boostrap's documentation of
                   the modal component before moving forward. Don't be fooled by the simplistic nature of this
                   example--even with this simple component, we'll still have an opportunity to take a look at each of
                   Stimulus' core concepts.</p>

                <h3>Getting Started</h3>

                <p>We can start by setting up a local installation of Stimulus. In addition to a <a
                            href="https://stimulusjs.org/handbook/installing">fairly comprehensive installation
                                                                              guide</a>, Stimulus offers a <a
                            href="https://github.com/stimulusjs/stimulus-starter">stimulus-starter repo</a> for quickly
                   getting up and running with a blank slate.</p>

                <p>Although I recommend reading through the installation guide later to gain a general understanding of
                   how it works, for this example we'll use <b>stimulus-starter</b> to keep things moving.</p>


                <pre><code class="language-html" data-lang="html"><span class="nt">&lt;div</span> <span class="na">class=</span><span
                                class="s">"btn-group"</span> <span class="na">role=</span><span class="s">"group"</span> <span
                                class="na">aria-label=</span><span class="s">"Basic example"</span><span
                                class="nt">&gt;</span>
  <span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"button"</span> <span class="na">class=</span><span
                                class="s">"btn btn-secondary"</span><span class="nt">&gt;</span>Left<span class="nt">&lt;/button&gt;</span>
  <span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"button"</span> <span class="na">class=</span><span
                                class="s">"btn btn-secondary"</span><span class="nt">&gt;</span>Middle<span class="nt">&lt;/button&gt;</span>
  <span class="nt">&lt;button</span> <span class="na">type=</span><span class="s">"button"</span> <span class="na">class=</span><span
                                class="s">"btn btn-secondary"</span><span class="nt">&gt;</span>Right<span class="nt">&lt;/button&gt;</span>
<span class="nt">&lt;/div&gt;</span></code></pre>


                <p>If all went well, you should be able to visit <code>http://localhost:9000/</code> in your preferred
                   browser and see...nothing! I love a blank white screen as much as the next guy, but it won't quite
                   cut it for our purposes. Since we know we're going to be using a Bootstrap component, let's take a
                   moment to import the Bootstrap CSS into our page. Open up <code>public/index.html</code> and replace
                   this line:</p>


                <blockquote><p><code>initialize</code> is just one of three lifecycle callbacks Stimulus offers (in
                                                       addition to <code>connect</code> and <code>disconnect</code>).
                                                       You can read more about the others in <a
                                href="https://stimulusjs.org/reference/lifecycle-callbacks">their documentation</a>.</p>
                </blockquote>


                <p>Next, since our page is still empty, let's create a basic wrapper <code>&lt;div&gt;</code> and put it
                   in between our <code>&lt;body&gt;</code> tags. This wrapper will contain two things: a <code>&lt;button&gt;</code>
                   to launch the modal, and the modal itself.</p>


                <p>Once you save the file and refresh your page, you should see <code>Hello World</code> printed in your
                   console! This is great; we've confirmed the connection exists... but how do we know it's connected to
                   the <em>right</em> element?</p>


                <p>Now if you refresh the page, your console should look something like this:</p>
                <p><img src="https://tighten.co/assets/img/blog/stimulus-blog-1.png"></p>
                <p>Fantastic; we've confirmed our connection.</p>
                <h3>Target Practice</h3>

                <ol>
                    <li>First, we have <code>click-&gt;</code>, which tells Stimulus what DOM event to listen for. Other
                        events are outlined in <a href="https://stimulusjs.org/reference/actions">the documentation</a>.
                    </li>
                    <li>Next, we have <code>demo#</code>. This is the name of the controller that contains the action
                        method. Just like targets, actions must be prefixed with their parent controller's name, this
                        time followed by a <code>#</code> character.
                    </li>
                    <li>Finally, we have <code>launchDemo</code>, which is the name of the method we made up for the
                        action inside our <code>demo</code> controller.
                    </li>
                </ol>


                <h3>Conclusion</h3>

                <p>We have successfully taken a traditional modal component from a third-party framework (Bootstrap) and
                   transformed it into a slim Stimulus controller that we could use anywhere on any site, without
                   requiring a virtual DOM or pulling in a bulky third-party JavaScript library full of components we
                   don't plan to use.</p>

                <p>At this point, it shouldn't be difficult to imagine other use cases where Stimulus could be useful.
                   How many sites have you built lately that use a hamburger menu? Or an image slider? React or Vue
                   might feel overpowered for small interactive elements like that, but Stimulus is a perfect fit.</p>

                <p>Do I think Stimulus is going to make virtual DOM frameworks obsolete? Absolutely not! Sites with
                   large, complex state systems would likely be difficult to maintain without tools like those. But if
                   you find yourself working in a monolith needing a tiny bit of interaction, Stimulus may be just what
                   you need.</p>

                <p>Questions? Comments? I'm <a href="https://twitter.com/imjohnbon">@imjohnbon</a> on Twitter and we're
                    <a href="https://twitter.com/tightenco">@tightenco</a>.</p>

            </div>



            <div class="col-xs-12 col-md-12 col-sm-12 text-center mt-4">
                <time>12/14/2018</time>
            </div>


        </div>
    </main>
@endsection