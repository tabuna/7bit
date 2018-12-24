@extends('layouts.app')


@section('content')
    <main class="position-relative pb-3 mt-3 mb-3">
        <div class="row bg-white pb-5">

            <!-- <div class="bg-info vertical-line-center"></div> -->

            <div>
                <h1>Stimulus 101: Создание&nbsp;модального&nbsp;окна</h1>
            </div>

            <div class="col-xs-12">
                <img src="https://tighten.co/assets/img/blog/stimulus-101-building-a-modal-feature-image.png"
                     class="img-fluid" style="max-height: 350px; width: 100%;object-fit: cover">
            </div>


            <div class="position-relative">


                <div class="post__body"><p><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Веб - </font><font
                                    style="vertical-align: inherit;">разработчики уже добавления интерактивности наших
                                веб - </font><font style="vertical-align: inherit;">сайтов , </font><font
                                    style="vertical-align: inherit;">так как </font><font
                                    style="vertical-align: inherit;">JavaScript был введен в 1995 году для большей части
                                последних 20+ лет JQuery был </font><font style="vertical-align: inherit;">инструмент
                                использовать , </font><font style="vertical-align: inherit;">чтобы добавить
                                , </font><font style="vertical-align: inherit;">что интерактивность. </font><font
                                    style="vertical-align: inherit;">jQuery прост и предоставляет стандартный API для
                                прямой манипуляции с элементами DOM в любом браузере. </font><font
                                    style="vertical-align: inherit;">Затем, в 2013 году, такие инструменты, как React и
                                Vue.js, открыли эру «виртуального DOM», представления о реальном DOM, построенном на
                                языках, которые (часто) выглядят как HTML, но которые на самом деле являются
                                JavaScript. </font><font style="vertical-align: inherit;">Модификация </font><em><font
                                        style="vertical-align: inherit;">реального</font></em><font
                                    style="vertical-align: inherit;"> DOM стала кощунственной, что-то, что нужно было
                                сделать в крайнем случае.</font></font><em><font
                                    style="vertical-align: inherit;"></font></em><font
                                style="vertical-align: inherit;"></font><em><font
                                    style="vertical-align: inherit;"></font></em><font
                                style="vertical-align: inherit;"></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Поэтому, когда
                                Basecamp объявил </font></font><a href="https://stimulusjs.org/"><font
                                    style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;">Stimulus</font></font></a><font
                                style="vertical-align: inherit;"><font style="vertical-align: inherit;"> , который сам
                                себя описал как «скромный JavaScript-фреймворк для HTML, который у вас уже есть»,
                                концепция была несколько радикальной и знакомой одновременно. </font><font
                                    style="vertical-align: inherit;">Стимул не только позволяет вам модифицировать
                                реальный DOM, он полностью охватывает концепцию.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">В этой статье мы
                                поговорим о Stimulus, о том, как он отличается от других современных платформ
                                JavaScript, и о том, как использовать его для создания реального взаимодействия на
                                странице - с DOM, который у вас уже есть.</font></font></p>
                    <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Что не так с
                                Virtual DOM?</font></font></h2>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Несмотря на то, что
                                концепция виртуального DOM, несомненно, является умной, она заставляет некоторых из нас
                                создавать приложения, которые визуализируют HTML непосредственно с сервера, с помощью
                                таких инструментов, как Laravel, в некотором роде. </font><font
                                    style="vertical-align: inherit;">Если мы хотим добавить даже немного взаимодействия
                                к нашему приложению, мы должны согнуть его структуру в соответствии с нашей виртуальной
                                платформой DOM.</font></font></p>
                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Нам часто оставляют
                                два варианта: превратить наше серверное приложение в JSON API, единственная цель
                                которого - использовать одностраничное приложение (SPA), или встраивать виртуальные
                                компоненты DOM в наш традиционный HTML-код. </font><font
                                    style="vertical-align: inherit;">То, что мы часто торгуем, не выглядит справедливым
                                по сравнению с тем, что мы получили.</font></font></p>
                    <p>Stimulus, unlike React and Vue.js, has no notion of a virtual DOM. Instead, it creates a bridge
                        between the real server-rendered DOM and JavaScript objects. Three core concepts are utilized to
                        do so: controllers, targets, and actions.</p>
                    <ul>
                        <li><strong>Controllers</strong> are JavaScript classes that each map directly to an element in
                            the DOM. Controllers give you control over all the children inside their matched element.
                        </li>
                        <li><strong>Targets</strong> are identifiers applied to DOM elements inside of controllers.
                            Targets allow you to reference these child elements by name within your controllers.
                        </li>
                        <li><strong>Actions</strong> are methods on your controllers that will be fired in response to
                            certain events. For instance, an action might be fired when a user clicks on a DOM element.
                        </li>
                    </ul>
                    <p>Don't worry if you didn't follow that completely; we're going to build something real that will
                        help make these concepts much clearer.</p>
                    <h3>What We're Building</h3>
                    <p>In this walkthrough, we're going to rebuild <a
                                href="https://getbootstrap.com/docs/4.1/components/modal/">Bootstrap 4's modal
                            component</a> using Stimulus. I recommend that you take a brief moment to read through
                        Boostrap's documentation of the modal component before moving forward. Don't be fooled by the
                        simplistic nature of this example--even with this simple component, we'll still have an
                        opportunity to take a look at each of Stimulus' core concepts.</p>
                    <h3>Getting Started</h3>
                    <p>We can start by setting up a local installation of Stimulus. In addition to a <a
                                href="https://stimulusjs.org/handbook/installing">fairly comprehensive installation
                            guide</a>, Stimulus offers a <a href="https://github.com/stimulusjs/stimulus-starter">stimulus-starter
                            repo</a> for quickly getting up and running with a blank slate.</p>
                    <p>Although I recommend reading through the installation guide later to gain a general understanding
                        of how it works, for this example we'll use <code>stimulus-starter</code> to keep things moving.
                    </p>
                    <p>Let's copy the installation commands to our terminal directly from the README:</p>
                    <pre><code class="hljs bash">$ git <span class="hljs-built_in">clone</span> https://github.com/stimulusjs/stimulus-starter.git<font></font>
$ <span class="hljs-built_in">cd</span> stimulus-starter<font></font>
$ yarn install<font></font>
$ yarn start</code></pre>
                    <blockquote><p>Wondering how to install Stimulus within Laravel? Don't worry, I wouldn't leave you
                            hanging. <a href="https://gist.github.com/imjohnbon/7de9ac3a75c680c62a4bbfe32716ef17">Check
                                out this gist for a Laravel-specific install guide</a>.</p></blockquote>
                    <p>If all went well, you should be able to visit <code>http://localhost:9000/</code> in your
                        preferred browser and see...nothing! I love a blank white screen as much as the next guy, but it
                        won't quite cut it for our purposes. Since we know we're going to be using a Bootstrap
                        component, let's take a moment to import the Bootstrap CSS into our page. Open up <code>public/index.html</code>
                        and replace this line:</p>
                    <pre><code class="hljs xml"><span class="hljs-tag">&lt;<span class="hljs-title">link</span> <span
                                        class="hljs-attribute">rel</span>=<span
                                        class="hljs-value">"stylesheet"</span> <span class="hljs-attribute">href</span>=<span
                                        class="hljs-value">"main.css"</span>&gt;</span></code></pre>
                    <p>with a link to Bootstrap:</p>
                    <pre><code class="hljs xml"><span class="hljs-tag">&lt;<span class="hljs-title">link</span> <span
                                        class="hljs-attribute">rel</span>=<span
                                        class="hljs-value">"stylesheet"</span> <span class="hljs-attribute">href</span>=<span
                                        class="hljs-value">"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"</span>&gt;</span></code></pre>
                    <p>Next, since our page is still empty, let's create a basic wrapper <code>&lt;div&gt;</code> and
                        put it in between our <code>&lt;body&gt;</code> tags. This wrapper will contain two things: a
                        <code>&lt;button&gt;</code> to launch the modal, and the modal itself.</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">button</span>&gt;</span>Launch Demo<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <blockquote><p>Note: For the sake of keeping our example code short, I have stripped down
                            Bootstrap's modal markup to its purest form. You can see the full markup in their
                            documentation. Feel free to use it if you prefer.</p></blockquote>
                    <p>If you refresh your page you should now see a single button that says "Launch Demo." Our goal
                        here is to make it so that when a user clicks on that button, the modal appears. That means
                        somehow we need to give Stimulus <em>control</em> over what happens when the button is clicked.
                        You may remember earlier how we talked about "controllers" and how they map to DOM elements and
                        give you control over the children inside of them. Well, that sounds like exactly what we need
                        right now, so let's create our first controller.</p>
                    <h3>Creating Our First Controller</h3>
                    <p>Since we're building a demo, I think it makes sense to call our first controller, you guessed it,
                        "demo." Create a new file inside of your <code>src/controllers</code> directory called <code>demo-controller.js</code>.
                        Then, paste the following code into that file:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
}</code></pre>
                    <p>This is standard Stimulus boilerplate for a new class. It just imports a base
                        <code>Controller</code> class from Stimulus and then creates a new class that extends that base
                        class.</p>
                    <p>So, our <code>demo</code> controller exists now, but our HTML hasn't gotten the memo. Let's
                        connect the controller to our HTML by adding a simple <code>data-controller</code> attribute to
                        our top-level container <code>&lt;div&gt;</code>:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">button</span>&gt;</span>Launch Demo<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>Congratulations, you've just created a magical connection between Stimulus and the DOM! Refresh
                        the page and be shocked and amazed at what you see! What's that? Nothing has changed? We don't
                        have any proof that this connection actually exists?</p> <h4>Is This Thing On?</h4>
                    <p>It's true that when you connect a Stimulus controller to your HTML code, there's no immediate
                        reaction that confirms this connection exists. Sure, we could just trust Stimulus, but I live by
                        the motto of "trust, but verify."</p>
                    <p>When a Stimulus controller connects to your DOM for the first time, it automatically fires a
                        method called <code>initialize</code>. We can leverage this method to confirm our connection.
                        Let's add an <code>initialize</code> method to our <code>demo</code> controller that contains a
                        <code>console.log</code>:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    initialize() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span class="hljs-string">"Hello World"</span>);<font></font>
    }<font></font>
}</code></pre>
                    <blockquote><p><code>initialize</code> is just one of three lifecycle callbacks Stimulus offers (in
                            addition to <code>connect</code> and <code>disconnect</code>). You can read more about the
                            others in <a href="https://stimulusjs.org/reference/lifecycle-callbacks">their
                                documentation</a>.</p></blockquote>
                    <p>Once you save the file and refresh your page, you should see <code>Hello World</code> printed in
                        your console! This is great; we've confirmed the connection exists... but how do we know it's
                        connected to the <em>right</em> element?</p>
                    <p>In our case, it should be connected to the top level container <code>&lt;div&gt;</code>, but as
                        of right now we really have no way of knowing that for sure. Thankfully, Stimulus controllers
                        come built-in with a <code>this.element</code> property which gives us direct access to the
                        element our controller is connected to.</p>
                    <p>Let's update our <code>console.log</code> to output the element itself:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    initialize() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span class="hljs-keyword">this</span>.element);<font></font>
    }<font></font>
}</code></pre>
                    <p>Now if you refresh the page, your console should look something like this:</p>
                    <p><img src="/assets/img/blog/stimulus-blog-1.png"
                            alt="Снимок экрана консоли с журналом, показывающим модальный элемент"></p>
                    <p>Fantastic; we've confirmed our connection.</p>
                    <h3>Target Practice</h3>
                    <p>We're making good progress here, but remember, our goal is to open the modal when a user clicks
                        on the "Launch Demo" button. The problem is, right now our controller has no idea the modal
                        exists! Sure, the modal is a child element of the controller, but how do we access it? It sounds
                        like we want our controller to be able to <em>target</em> the modal. At the beginning of this
                        post, we described targets as "identifiers that are applied to DOM elements inside of
                        controllers that allow you to reference those elements by name." In this situation, our modal is
                        the element that we want our <code>demo</code> controller to be able to target by name, so let's
                        add a "modal" target to our <code>demo</code> controller like so:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    initialize() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span class="hljs-keyword">this</span>.element);<font></font>
    }<font></font>
}</code></pre>
                    <p>As you can see above, targets are added to controllers via the static <code>targets</code>
                        property. And just like with controllers, we still need to connect the target to our HTML. This
                        time we'll add a <code>data-target</code> attribute to the element we want to target (in this
                        case, our modal):</p>
                    <blockquote><p>Note: The <code>static</code> prefix on the <code>targets</code> property may look
                            unfamiliar to you. Static properties are not included by default in ES6, but the <code>stimulus-starter</code>
                            generator we used makes them possible by including the <code>@babel/plugin-proposal-class-properties</code>.
                            Static properties are properties that are called on the class itself, rather than on
                            instances of the class. It is not important to fully understand them for the purposes of
                            this demo.</p></blockquote>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">button</span>&gt;</span>Launch Demo<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>You may have noticed that we named our target <code>demo.modal</code> instead of just
                        <code>modal</code>. This is because targets must be prefixed with the name of the controller
                        they belong to, separated by a dot. You may be thinking: "Shouldn't the target know which
                        controller it belongs to? It is nested inside that controller, after all." I'll explain this in
                        detail later, but the short answer is: elements can be attached to more than one controller.</p>
                    <p>Now that our target is connected to our HTML, let's test the connection just like we did with our
                        controller. We can reference a target anywhere in a controller with the following convention:
                        <code>this.[name]Target</code>. So in this case, we can reference it by
                        <code>this.modalTarget</code>. Let's update our <code>initialize</code> method to <code>console.log</code>
                        our <code>modal</code> target:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    initialize() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span class="hljs-keyword">this</span>.modalTarget);<font></font>
    }<font></font>
}</code></pre>
                    <p>If we return to our page and click the "Launch Demo" button again, instead of seeing our
                        top-level <code>&lt;div&gt;</code> output in the console, we should see our modal <code>&lt;div&gt;</code>.
                        We have successfully set up our first Stimulus target.</p>
                    <h3>Less Talk, More Action</h3>
                    <p>So far, we've been exclusively using the <code>initialize</code> method of our controller. The
                        problem is, this method runs just once when the controller connects to the DOM for the first
                        time. If we're going to open the modal when a user clicks the "Launch Demo" button, what we
                        really need is a method that runs on demand.</p>
                    <p>This is where actions come in. What are actions? In classic Stimulus fashion, actions are nothing
                        more than simple methods on a controller. We want to do something when a user clicks the "Launch
                        Demo" button, so let's create an action called <code>launchDemo</code>:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo(event) {<font></font>
        <span class="hljs-built_in">console</span>.log(event);<font></font>
    }<font></font>
}</code></pre>
                    <p>As you can see, our <code>launchDemo</code> action method accepts an <code>event</code> parameter
                        (as do all Stimulus actions by default), and then it <code>console.log</code>s it out.</p>
                    <p>Although we've created our action, our HTML still has no idea when to fire it. Just like with
                        controllers and targets, we'll need to connect this action to our HTML. We can do that by adding
                        a <code>data-action</code> property to our <code>&lt;button&gt;</code>:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span
                class="hljs-attribute">data-action</span>=<span class="hljs-value">"click-&gt;demo#launchDemo"</span>&gt;</span>Launch Demo<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>Let's take a look at each part of that action and break down what it does:</p>
                    <ul>
                        <li>First, we have <code>click-&gt;</code>, which tells Stimulus what DOM event to listen for.
                            Other events are outlined in <a href="https://stimulusjs.org/reference/actions">the
                                documentation</a>.
                        </li>
                        <li>Next, we have <code>demo#</code>. This is the name of the controller that contains the
                            action method. Just like targets, actions must be prefixed with their parent controller's
                            name, this time followed by a <code>#</code> character.
                        </li>
                        <li>Finally, we have <code>launchDemo</code>, which is the name of the method we made up for the
                            action inside our <code>demo</code> controller.
                        </li>
                    </ul>
                    <p>All together, Stimulus calls this string an "action descriptor". Let's refresh our page now and
                        click the "Launch Demo" button a few more times. If all went well, the console should be filled
                        with events:</p>
                    <p><img src="/assets/img/blog/stimulus-blog-2.png"
                            alt="Снимок экрана консоли с журналом, показывающим три события"></p>
                    <p>We've now covered the three major concepts in Stimulus: controllers, targets, and actions. But
                        our last step presents us with an interesting problem: We have a modal target that references
                        our modal, and an action that runs whenever we click the "Launch Demo" button, but how do we
                        tell our modal target that we want our modal to open? If anything, "open" almost sounds like an
                        action that we want our modal target to do. But targets don't have actions, they're just named
                        references to DOM elements. Could it be that our modal target also needs to be...a
                        controller?</p>
                    <h3>Mix and Match</h3>
                    <p>What we just discovered is one of the big concepts in Stimulus that I didn't quite grasp at
                        first. Elements don't have to be <em>just</em> controllers or <em>just</em> targets or
                        <em>just</em> fire actions. In fact, it's very common for an element to be a target <em>and</em>
                        a controller, or be a target <em>and</em> fire an action. In our demo app, the modal is a target
                        of the <code>demo</code> controller, but it looks like it needs to be a controller itself too.
                    </p>
                    <p>Let's get started by creating a <code>modal-controller.js</code> file inside of our <code>src/controllers</code>
                        directory. We'll once again paste in the standard controller boilerplate with an added
                        initialize method to confirm our connection:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    initialize() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span
                                    class="hljs-string">"Modal controller connected!"</span>);<font></font>
    }<font></font>
}</code></pre>
                    <p>Now that our controller is created, let's hook it up to our modal <code>&lt;div&gt;</code>:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span
                class="hljs-attribute">data-action</span>=<span class="hljs-value">"click-&gt;demo#launchDemo"</span>&gt;</span>Launch Demo<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>As you can see, we've added the <code>data-controller="modal"</code> attribute to our modal in
                        addition to the <code>data-target</code> attribute. Our modal is now a target of the
                        <code>demo</code> controller, and a controller itself. We can confirm as much by refreshing the
                        page, and seeing our "Modal controller connected!" log in the console.</p>
                    <p>As usual, the <code>initialize</code> method is helpful for confirming a connection, but it's a
                        bit too limited for our needs. Moving forward, we need to be able to <em>open</em> the modal
                        whenever we want. Or in other words, "open" is an action we want to perform on a modal. So I
                        think it makes sense to add an open action to our modal controller:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    open() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span
                                    class="hljs-string">"The modal has been opened!"</span>);<font></font>
    }<font></font>
}</code></pre>
                    <p>Things are coming together nicely, but something feels a bit... disconnected. We have our <code>demo</code>
                        controller, which has a <code>launchDemo</code> action. Inside that action, we have access to
                        our <code>modal</code> target. Additionally, we now have a <code>modal</code> controller, which
                        contains our <code>open</code> action. How the heck do we call the <code>open</code> action from
                        our target? If you're like me, your gut might be to try updating your <code>launchDemo</code>
                        action to look something like this:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo() {<font></font>
        <span class="hljs-keyword">this</span>.modalTarget.open();<font></font>
    }<font></font>
}</code></pre>
                    <p>But if you try and run that, you'll just get a big fat error in your console. This is because our
                        <code>modal</code> target is just a reference to a DOM element, it's not an instance of the
                        <code>modal</code> controller. It has no idea that it's a controller too!</p>
                    <p>So what we really need is a way to access the <code>modal</code> controller from our
                        <code>modal</code> target. Thankfully, Stimulus offers a method to do just that called <code>getControllerForElementAndIdentifier</code>.
                    </p>
                    <h3>getControllerForElementAndIdentifier</h3>
                    <p><code>getControllerForElementAndIdentifier</code> is a very powerful method built into Stimulus
                        that allows you to pass in an element (often a target) and an identifier (often a controller
                        name) and returns the controller instance as an object. Let's add this to our
                        <code>launchDemo</code> action to access the <code>modal</code> controller from our
                        <code>modal</code> target:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo() {<font></font>
        <span class="hljs-keyword">let</span> modalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"modal"</span><font></font>
        );<font></font>
        <span class="hljs-built_in">console</span>.log(modalController);<font></font>
    }<font></font>
}</code></pre>
                    <blockquote><p>We haven't discussed the <code>this.application</code> property on Stimulus
                            controllers before. As you may expect, there's a global 'application' that represents
                            Stimulus and this property returns it. Every controller has access to it.</p></blockquote>
                    <p>We've passed <code>getControllerForElementAndIdentifier</code> two parameters: our
                        <code>modal</code> target element, and the string "modal" which represents the name of the
                        controller we want. If you refresh your page and click on the "Launch Demo" button a few times,
                        you'll see your console is now filled with modal controller instances:</p>
                    <p><img src="/assets/img/blog/stimulus-blog-3.png"
                            alt="Снимок экрана консоли с журналом, показывающим экземпляры модального контроллера"></p>
                    <p>That means that from inside of our <code>launchDemo</code> action we can now call the
                        <code>open</code> action on our <code>modal</code> controller, like so:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo() {<font></font>
        <span class="hljs-keyword">let</span> modalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"modal"</span><font></font>
        );<font></font>
        modalController.open();<font></font>
    }<font></font>
}</code></pre>
                    <p>Refresh your page again, click the button a few more times, and you should now see "The modal has
                        been opened!" scattered about. Congratulations! You've now called a controller action from
                        another controller action.</p>
                    <h3>Opening the Modal (for real)</h3>
                    <p>We've managed to tell our modal that we want it to open when a user clicks on the button, now we
                        need to actually open it. In Bootstrap 4, opening a modal involves 3 steps:</p>
                    <ol>
                        <li>A <code>modal-open</code> class needs to be applied to the <code>&lt;body&gt;</code>
                            element.
                        </li>
                        <li>A <code>show</code> class needs to be applied to the modal element, along with a <code>display:
                                block;</code> inline style attribute.
                        </li>
                        <li>The following markup needs to be injected to the end of our <code>&lt;body&gt;</code> tag:
                            <code>&lt;div class="modal-backdrop fade show"&gt;&lt;/div&gt;</code> (this adds the light
                            gray overlay behind the modal).
                        </li>
                    </ol>
                    <p>First, we need to add a <code>modal-open</code> class to the <code>&lt;body&gt;</code> element.
                        How do we do that? Don't forget, Stimulus classes are really just basic JavaScript classes. So
                        if we need to add a class to the body element, we can do it exactly how we'd normally do it in
                        pure JavaScript:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    open() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.add(<span
                                    class="hljs-string">"modal-open"</span>);<font></font>
    }<font></font>
}</code></pre>
                    <p>Next, we need to add a <code>show</code> class to our modal element, along with <code>display:
                            block;</code> as an inline style attribute. You may remember from earlier that we have
                        access to our modal element easily via Stimulus' <code>this.element</code> property. And once
                        again, we can use good old-fashioned JavaScript methods to accomplish both of those tasks
                        easily:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    open() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.add(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.setAttribute(<span class="hljs-string">"style"</span>, <span
                                    class="hljs-string">"display: block;"</span>);
        <span class="hljs-keyword">this</span>.element.classList.add(<span
                                    class="hljs-string">"show"</span>);<font></font>
    }<font></font>
}</code></pre>
                    <p>Look at us go! Now we just need to inject the <code>&lt;div class="modal-backdrop fade show"&gt;&lt;/div&gt;</code>
                        markup at the end of the body tag to give us the classic light gray modal overlay. We can
                        accomplish that via the <code>innerHtml</code> property on <code>document.body</code>:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    open() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.add(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.setAttribute(<span class="hljs-string">"style"</span>, <span
                                    class="hljs-string">"display: block;"</span>);
        <span class="hljs-keyword">this</span>.element.classList.add(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.body.innerHTML += <span class="hljs-string">'&lt;div class="modal-backdrop fade show"&gt;&lt;/div&gt;'</span>;<font></font>
    }<font></font>
}</code></pre>
                    <p>Boom! If we go back to our page now and click the button, a Bootstrap modal should appear. We
                        have a problem though: we opened the modal but we can't close it! To solve this, let's add a
                        <code>close</code> action to our <code>modal</code> controller that just reverses everything the
                        <code>open</code> action did:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    open() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.add(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.setAttribute(<span class="hljs-string">"style"</span>, <span
                                    class="hljs-string">"display: block;"</span>);
        <span class="hljs-keyword">this</span>.element.classList.add(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.body.innerHTML += <span class="hljs-string">'&lt;div class="modal-backdrop fade show"&gt;&lt;/div&gt;'</span>;<font></font>
    }<font></font>
<font></font>
    close() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.remove(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.removeAttribute(<span class="hljs-string">"style"</span>);
        <span class="hljs-keyword">this</span>.element.classList.remove(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.getElementsByClassName(<span
                                    class="hljs-string">"modal-backdrop"</span>)[<span class="hljs-number">0</span>].remove();<font></font>
    }<font></font>
}</code></pre>
                    <p>We'll also add a button to our modal markup that calls the <code>close</code> action for us:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span
                class="hljs-attribute">data-action</span>=<span class="hljs-value">"click-&gt;demo#launchDemo"</span>&gt;</span>Launch Demo<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                            class="hljs-value">"click-&gt;modal#close"</span>&gt;</span>Close<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>Now if you refresh your page, open the modal, then click the close button, the modal will
                        close.</p>
                    <h3>But Wait, There's More...</h3>
                    <p>At this point, we've successfully completed our original goal of taking a standard Bootstrap
                        modal and turning it into a Stimulus controller. But in the real world, modals rarely have fixed
                        content. Instead, they are heavily customized; the content often depends on what you clicked to
                        trigger it. So let's alter our example to be a tiny bit more complex.</p>
                    <p>In our updated example, rather than just having a single button, we'll have a button for each
                        co-host of the <a href="https://twentypercent.fm/">Twenty Percent Time</a> podcast (Daniel
                        Coulbourne and Caleb Porzio). Clicking on the button for each co-host will fill the modal with
                        personalized content about them (their full name, email, and job title). First, let's update our
                        markup to reflect this change:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">ol</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span>&gt;</span>Daniel<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><span
                                    class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span>&gt;</span>Caleb<span
                                    class="hljs-tag">&lt;/<span class="hljs-title">button</span>&gt;</span><span
                                    class="hljs-tag">&lt;/<span class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ol</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                            class="hljs-value">"click-&gt;modal#close"</span>&gt;</span>Close<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>Next, if we're going to do something different depending on which co-host was clicked, we'll need
                        a way to figure out which button was clicked inside our <code>launchDemo</code> action.</p>
                    <p>Earlier, we discussed how every Stimulus action receives an <code>event</code> object by default.
                        There's nothing special about this object; it's just a <a
                                href="https://developer.mozilla.org/en-US/docs/Web/API/Event">basic JavaScript event</a>.
                        As such, we have access to a <a
                                href="https://developer.mozilla.org/en-US/docs/Web/API/Event/currentTarget">property
                            called <code>currentTarget</code></a> which returns the element that the event handler was
                        attached to. In our case, because our actions are attached to each button,
                        <code>currentTarget</code> will return whichever button was clicked.</p>
                    <p>Let's update our <code>launchDemo</code> action to test this out:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo(event) {<font></font>
        <span class="hljs-keyword">let</span> modalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"modal"</span><font></font>
        );<font></font>
        modalController.open();<font></font>
<font></font>
        <span class="hljs-built_in">console</span>.log(event.currentTarget);<font></font>
    }<font></font>
}</code></pre>
                    <p>If you save this change, refresh your page and click on each button, you'll notice that each log
                        in your console reflects which button was clicked.</p>
                    <p>So now we know which button was clicked, but a bigger problem remains. How do we tell Stimulus
                        what we want the content of the modal to be for each co-host? In other frameworks, each button
                        might be its own component with its own state. But in Stimulus, all we have is our real DOM.</p>
                    <p>Let's take a step back and think about that for a second. Does the real DOM have any way to give
                        elements their own "state"? I'd argue it does, and that we've been using it this entire time.
                        That's right, I'm talking about data attributes.</p>
                    <h3>Data Attributes as State</h3>
                    <p>Throughout this walkthrough, we've repeatedly used <code>data-controller</code>, <code>data-target</code>,
                        and <code>data-action</code> attributes. These specific attributes are custom to Stimulus, but
                        of course, we can apply any attribute we want to any element we want. For our demo, the co-host
                        information that relates to each button is essentially metadata for that button. And storing
                        metadata on an element is <a href="http://html5doctor.com/html5-custom-data-attributes/">exactly
                            what data attributes are for</a>. So let's add some data attributes to our buttons
                        representing the full name, email, and job title of each co-host:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">ol</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span class="hljs-value">"Daniel Coulbourne"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"daniel@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Daniel<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span
                                        class="hljs-value">"Caleb Porzio"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"caleb@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Caleb<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ol</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span
                        class="hljs-value">"modal-content"</span>&gt;</span><font></font>
                This is a modal<font></font>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                            class="hljs-value">"click-&gt;modal#close"</span>&gt;</span>Close<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>Once again, we need nothing more than pure JavaScript to access these attributes inside our
                        controller. The <code>event.currentTarget</code> attribute we discussed earlier has a property
                        called <code>dataset</code> which gives us access to all the data attributes on the element.
                        Let's update our <code>launchDemo</code> action to <code>console.log</code> the dataset out:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo(event) {<font></font>
        <span class="hljs-keyword">let</span> modalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"modal"</span><font></font>
        );<font></font>
        modalController.open();<font></font>
<font></font>
        <span class="hljs-built_in">console</span>.log(event.currentTarget.dataset);<font></font>
    }<font></font>
}</code></pre>
                    <p>Now if you click on a button, you should see the data attributes specific to that button in your
                        console:</p>
                    <p><img src="/assets/img/blog/stimulus-blog-4.png"
                            alt="Снимок экрана консоли с журналом, показывающим атрибуты данных нажатых кнопок"></p>
                    <p>Our controller now knows two things that it didn't know earlier: which button was clicked, and
                        what the data attributes are for that button. That leaves us with one final problem: how do we
                        get that content into our modal?</p>
                    <h3>Injecting Content into the Modal</h3>
                    <p>Before we can inject the content into our modal, we need to tell Stimulus where we want that
                        content to go in our HTML. Let's add an <code>&lt;h2&gt;</code> element for the name of the
                        host, a <code>&lt;span&gt;</code> element for their job title, and an <code>&lt;a&gt;</code> tag
                        for their email. Additionally, since we know we're soon going to use Stimulus to change the
                        content of these elements, let's make them targets of the modal.</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">ol</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span class="hljs-value">"Daniel Coulbourne"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"daniel@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Daniel<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span
                                        class="hljs-value">"Caleb Porzio"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"caleb@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Caleb<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ol</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span class="hljs-value">"modal-content"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">h2</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"modal.name"</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">h2</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">span</span> <span
                            class="hljs-attribute">data-target</span>=<span class="hljs-value">"modal.title"</span>&gt;</span><span
                                    class="hljs-tag">&lt;/<span class="hljs-title">span</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">a</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"modal.email"</span> <span class="hljs-attribute">href</span>=<span
                            class="hljs-value">""</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">a</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                            class="hljs-value">"click-&gt;modal#close"</span>&gt;</span>Close<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>Likewise, we'll need to update our <code>modal</code> controller to add these new targets to our
                        static <code>targets</code> array:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">'name'</span>, <span class="hljs-string">'title'</span>, <span
                                    class="hljs-string">'email'</span>];<font></font>
<font></font>
    open() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.add(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.setAttribute(<span class="hljs-string">"style"</span>, <span
                                    class="hljs-string">"display: block;"</span>);
        <span class="hljs-keyword">this</span>.element.classList.add(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.body.innerHTML += <span class="hljs-string">'&lt;div class="modal-backdrop fade show"&gt;&lt;/div&gt;'</span>;<font></font>
    }<font></font>
<font></font>
    close() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.remove(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.removeAttribute(<span class="hljs-string">"style"</span>);
        <span class="hljs-keyword">this</span>.element.classList.remove(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.getElementsByClassName(<span
                                    class="hljs-string">"modal-backdrop"</span>)[<span class="hljs-number">0</span>].remove();<font></font>
    }<font></font>
}</code></pre>
                    <p>With the targets created and connected, we can add a new action to our <code>modal</code>
                        controller called <code>setCoHostContent</code>. We'll use this action to update the content of
                        the modal targets with the data from the custom data attributes on our buttons:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">'name'</span>, <span class="hljs-string">'title'</span>, <span
                                    class="hljs-string">'email'</span>];<font></font>
<font></font>
    setCoHostContent(data) {<font></font>
        <span class="hljs-keyword">this</span>.nameTarget.innerHTML = data.name;
        <span class="hljs-keyword">this</span>.titleTarget.innerHTML = data.title;
        <span class="hljs-keyword">this</span>.emailTarget.href = <span class="hljs-string">'mailto:'</span> + data.email;
        <span class="hljs-keyword">this</span>.emailTarget.innerHTML = data.email;<font></font>
    }<font></font>
<font></font>
    open() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.add(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.setAttribute(<span class="hljs-string">"style"</span>, <span
                                    class="hljs-string">"display: block;"</span>);
        <span class="hljs-keyword">this</span>.element.classList.add(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.body.innerHTML += <span class="hljs-string">'&lt;div id="modal-backdrop" class="modal-backdrop fade show"&gt;&lt;/div&gt;'</span>;<font></font>
    }<font></font>
<font></font>
    close() {<font></font>
        <span class="hljs-built_in">document</span>.body.classList.remove(<span class="hljs-string">"modal-open"</span>);
        <span class="hljs-keyword">this</span>.element.removeAttribute(<span class="hljs-string">"style"</span>);
        <span class="hljs-keyword">this</span>.element.classList.remove(<span class="hljs-string">"show"</span>);
        <span class="hljs-built_in">document</span>.getElementsByClassName(<span
                                    class="hljs-string">"modal-backdrop"</span>)[<span class="hljs-number">0</span>].remove();<font></font>
    }<font></font>
}</code></pre>
                    <p>Now that this function exists, we can call it from our <code>launchDemo</code> action, making a
                        note to pass in the dataset:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo(event) {<font></font>
        <span class="hljs-keyword">let</span> modalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"modal"</span><font></font>
        );<font></font>
        modalController.setCoHostContent(event.currentTarget.dataset);<font></font>
        modalController.open();<font></font>
    }<font></font>
}</code></pre>
                    <p>If you refresh your page and click on the buttons, you'll notice the modal content now changes
                        depending on which button you click!</p>
                    <p>This is great. We've accomplished our goal of opening the modal with Stimulus, and even
                        customized its content.</p>
                    <p>But if you're like me, something just doesn't <em>feel</em> right. There are three actions inside
                        our <code>modal</code> controller: <code>open</code>, <code>close</code>, and <code>setCoHostContent</code>.
                        Open and close are generic, high-level actions that could apply to any modal containing any
                        content. But <code>setCoHostContent</code>? This action is specific to our use case of a modal
                        that displays information about the co-hosts of Twenty Percent Time.</p>
                    <h3>Multiple Controllers</h3>
                    <p>This gives us the perfect opportunity to talk about something we briefly mentioned earlier:
                        elements aren't limited to being a single controller. In fact, an element can be connected to as
                        many controllers as you want!</p>
                    <p>Because our <code>setCoHostContent</code> method is very specific to our co-host modal, maybe it
                        would be better suited in a controller--let's call it, you guessed it, "co-host modal." Inside
                        your <code>src/controllers</code> directory, create a new controller called <code>co-host-modal-controller.js</code>
                        and paste in the standard Stimulus controller code with an <code>initialize</code> method that
                        confirms the connection:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/co-host-modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    initialize() {<font></font>
        <span class="hljs-built_in">console</span>.log(<span
                                    class="hljs-string">"Connected to co-host-modal"</span>);<font></font>
    }<font></font>
}</code></pre>
                    <p>Now let's return to our modal HTML code, and add <code>co-host-modal</code> to the <code>data-controller</code>
                        property:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">ol</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span class="hljs-value">"Daniel Coulbourne"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"daniel@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Daniel<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span
                                        class="hljs-value">"Caleb Porzio"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"caleb@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Caleb<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ol</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal co-host-modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span class="hljs-value">"modal-content"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">h2</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"modal.name"</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">h2</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">span</span> <span
                            class="hljs-attribute">data-target</span>=<span class="hljs-value">"modal.title"</span>&gt;</span><span
                                    class="hljs-tag">&lt;/<span class="hljs-title">span</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">a</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"modal.email"</span> <span class="hljs-attribute">href</span>=<span
                            class="hljs-value">""</span>&gt;</span><span class="hljs-tag">&lt;/<span class="hljs-title">a</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                            class="hljs-value">"click-&gt;modal#close"</span>&gt;</span>Close<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>If you refresh your page now, not only should the modal still work, but you should see "Connected
                        to co-host-modal" in your console. Our modal component is now connected to two different
                        controllers.</p>
                    <p>Let's move our <code>setCoHostContent</code> method from our <code>modal</code> controller to our
                        <code>co-host-modal</code> controller, as well as the relevant targets:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/co-host-modal-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">'name'</span>, <span class="hljs-string">'title'</span>, <span
                                    class="hljs-string">'email'</span>];<font></font>
<font></font>
    setCoHostContent(data) {<font></font>
        <span class="hljs-keyword">this</span>.nameTarget.innerHTML = data.name;
        <span class="hljs-keyword">this</span>.titleTarget.innerHTML = data.title;
        <span class="hljs-keyword">this</span>.emailTarget.href = <span class="hljs-string">'mailto:'</span> + data.email;
        <span class="hljs-keyword">this</span>.emailTarget.innerHTML = data.email;<font></font>
    }<font></font>
}</code></pre>
                    <p>We'll also need to update the relevant <code>data-target</code> attributes in our HTML to be
                        prefixed with <code>co-host-modal</code> instead of <code>modal</code>:</p>
                    <pre><code class="language-html hljs xml">// public/index.html
<span class="hljs-tag">&lt;<span class="hljs-title">body</span>&gt;</span>
<span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">id</span>=<span
            class="hljs-value">"app"</span> <span class="hljs-attribute">data-controller</span>=<span
            class="hljs-value">"demo"</span>&gt;</span>
    <span class="hljs-tag">&lt;<span class="hljs-title">ol</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span class="hljs-value">"Daniel Coulbourne"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"daniel@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Daniel<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">li</span>&gt;</span><span class="hljs-tag">&lt;<span
                                        class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                                        class="hljs-value">"click-&gt;demo#launchDemo"</span> <span
                                        class="hljs-attribute">data-name</span>=<span
                                        class="hljs-value">"Caleb Porzio"</span> <span
                                        class="hljs-attribute">data-email</span>=<span class="hljs-value">"caleb@tighten.co"</span> <span
                                        class="hljs-attribute">data-title</span>=<span
                                        class="hljs-value">"Developer"</span>&gt;</span>Caleb<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">li</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">ol</span>&gt;</span><font></font>
<font></font>
    <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                class="hljs-value">"modal"</span> <span class="hljs-attribute">data-controller</span>=<span
                class="hljs-value">"modal co-host-modal"</span> <span class="hljs-attribute">data-target</span>=<span
                class="hljs-value">"demo.modal"</span>&gt;</span>
        <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span class="hljs-attribute">class</span>=<span
                    class="hljs-value">"modal-dialog"</span>&gt;</span>
            <span class="hljs-tag">&lt;<span class="hljs-title">div</span> <span
                        class="hljs-attribute">class</span>=<span class="hljs-value">"modal-content"</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">h2</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"co-host-modal.name"</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">h2</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">span</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"co-host-modal.title"</span>&gt;</span><span class="hljs-tag">&lt;/<span
                                        class="hljs-title">span</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">a</span> <span
                            class="hljs-attribute">data-target</span>=<span
                            class="hljs-value">"co-host-modal.email"</span> <span
                            class="hljs-attribute">href</span>=<span class="hljs-value">""</span>&gt;</span><span
                                    class="hljs-tag">&lt;/<span class="hljs-title">a</span>&gt;</span>
                <span class="hljs-tag">&lt;<span class="hljs-title">button</span> <span class="hljs-attribute">data-action</span>=<span
                            class="hljs-value">"click-&gt;modal#close"</span>&gt;</span>Close<span class="hljs-tag">&lt;/<span
                                        class="hljs-title">button</span>&gt;</span>
            <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
        <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
    <span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">div</span>&gt;</span>
<span class="hljs-tag">&lt;/<span class="hljs-title">body</span>&gt;</span></code></pre>
                    <p>If you return to your page and click on the buttons again, you might notice something strange.
                        The modal doesn't even open any more, and we're getting an error in our console. This is because
                        inside our <code>launchDemo</code> method, we're still calling <code>setCoHostContent</code> on
                        our <code>modal</code> controller. We need to update it so that we call it on our <code>co-host-modal</code>
                        instead:</p>
                    <pre><code class="language-js hljs javascript"><span class="hljs-comment">// src/controllers/demo-controller.js</span>
import { Controller } from <span class="hljs-string">"stimulus"</span>;<font></font>
<font></font>
export <span class="hljs-keyword">default</span> <span
                                    class="hljs-keyword">class</span> extends Controller {<font></font>
    static targets = [<span class="hljs-string">"modal"</span>];<font></font>
<font></font>
    launchDemo(event) {<font></font>
        <span class="hljs-keyword">let</span> modalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"modal"</span><font></font>
        );<font></font>
        <span class="hljs-keyword">let</span> coHostModalController = <span class="hljs-keyword">this</span>.application.getControllerForElementAndIdentifier(
            <span class="hljs-keyword">this</span>.modalTarget,
            <span class="hljs-string">"co-host-modal"</span><font></font>
        );<font></font>
        coHostModalController.setCoHostContent(event.currentTarget.dataset);<font></font>
        modalController.open();<font></font>
    }<font></font>
}</code></pre>
                    <p>If you refresh your page for a final time, the modal not only opens, but is filled with content
                        specific to each co-host.</p>
                    <h3>Conclusion</h3>
                    <p>We have successfully taken a traditional modal component from a third-party framework (Bootstrap)
                        and transformed it into a slim Stimulus controller that we could use anywhere on any site,
                        without requiring a virtual DOM or pulling in a bulky third-party JavaScript library full of
                        components we don't plan to use.</p>
                    <p>At this point, it shouldn't be difficult to imagine other use cases where Stimulus could be
                        useful. How many sites have you built lately that use a hamburger menu? Or an image slider?
                        React or Vue might feel overpowered for small interactive elements like that, but Stimulus is a
                        perfect fit.</p>
                    <p>Do I think Stimulus is going to make virtual DOM frameworks obsolete? Absolutely not! Sites with
                        large, complex state systems would likely be difficult to maintain without tools like those. But
                        if you find yourself working in a monolith needing a tiny bit of interaction, Stimulus may be
                        just what you need.</p>
                    <p>Questions? Comments? I'm <a href="https://twitter.com/imjohnbon">@imjohnbon</a> on Twitter and
                        we're <a href="https://twitter.com/tightenco">@tightenco</a>.</p></div>


                <p>Web developers have been adding interactivity to our web sites since JavaScript was introduced in
                    1995. For much of the last 20+ years, jQuery was <em>the</em> tool to use to add that interactivity.
                    jQuery is simple, and provides a standard API to directly manipulate DOM elements in any browser.
                    Then, in 2013, tools like React and Vue.js ushered in the era of the "virtual DOM," a representation
                    of the real DOM built with languages that (often) look like HTML but which, in actuality, are
                    JavaScript. Modifying the <em>real</em> DOM became blasphemous, something to be done as a last
                    resort.</p>
                <h3>Заголовок H3</h3>

                <p>So when Basecamp announced <a href="https://stimulusjs.org/">Stimulus</a>, self-described as "a
                    modest JavaScript framework for the HTML you already have", the concept was somehow radical and
                    familiar at the same time. Stimulus doesn't just allow you to modify the real DOM, it embraces the
                    concept entirely.</p>


                <h2>What's So Wrong with the Virtual&nbsp;DOM?</h2>

                <p>While the concept of the virtual DOM is undoubtedly clever, it has left those of us building
                    applications that render HTML directly from the server with tools like Laravel in a bit of a bind.
                    If we want to add even a little bit of interaction to our application, we must bend its structure to
                    the will of our virtual DOM framework.</p>

                <p>We're often left with two options: turn our server-side application into a JSON API whose sole
                    purpose is to be consumed by a single page application (SPA), or intersperse virtual DOM components
                    within our traditional HTML code. What we've traded often doesn't feel fair compared to what we
                    got.</p>

                <blockquote>
                    <p>Для предложения улучшений этого руководства, создайте новый <a
                                href="https://github.com/orchidsoftware/platform/issues">issue</a>.
                        Если появятся вопросы или ошибки по документации, пожалуйста, укажите главу и сопутствующий
                        текст, чтобы указать на ошибку.</p>
                </blockquote>

                <p>Stimulus, unlike React and Vue.js, has no notion of a virtual DOM. Instead, it creates a bridge
                    between the real server-rendered DOM and JavaScript objects. Three core concepts are utilized to do
                    so: controllers, targets, and actions.</p>

                <ul>
                    <li><strong>Controllers</strong> are JavaScript classes that each map directly to an element in the
                        DOM. Controllers give you control over all the children inside their matched element.
                    </li>
                    <li><strong>Targets</strong> are identifiers applied to DOM elements inside of controllers. Targets
                        allow you to reference these child elements by name within your controllers.
                    </li>
                    <li><strong>Actions</strong> are methods on your controllers that will be fired in response to
                        certain events. For instance, an action might be fired when a user clicks on a DOM element.
                    </li>
                </ul>

                <pre style="height: 499px;">
                <code>
// src/controllers/demo-controller.js
import { Controller } from "stimulus";

export default class extends Controller {
    initialize() {
        console.log("Hello World");
    }
}

                </code>
                </pre>

            </div>


        </div>
    </main>
@endsection