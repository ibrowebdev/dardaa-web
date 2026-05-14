@extends('layouts.app')

@section('title', 'Request Digital Strategy Quote | DARDAA WEB')
@section('meta_description', 'Deploy your multi-step quote alignment pipeline instantly. Let\'s evaluate requirements, budgeting and execution maps.')

@section('content')
    {{-- Page Hero --}}
    <section class="pt-32 pb-12 relative overflow-hidden bg-surface hero-gradient border-b border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-fade-in-up">
            <span class="text-primary font-semibold text-sm uppercase tracking-widest block mb-3" style="font-family: var(--font-display)">Alignment Rig</span>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-text mb-6" style="font-family: var(--font-display)">
                Build Strategic <span class="gradient-text">Proposal</span>
            </h1>
            <p class="text-muted text-sm md:text-base max-w-xl mx-auto">
                Map your needs, timelines, and budgeting scopes. We process alignments to schedule exact execution timelines.
            </p>
        </div>
    </section>

    {{-- Form System --}}
    <section class="py-20 bg-surface/30 min-h-[600px]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div x-data="{ 
                    step: 1,
                    services: [],
                    projectName: '',
                    projectDesc: '',
                    budget: '',
                    timeline: '',
                    targetAudience: '',
                    clientName: '',
                    clientEmail: '',
                    clientPhone: '',
                    company: '',
                    source: '',

                    validateStep1() {
                        return this.services.length > 0;
                    },
                    validateStep2() {
                        return this.projectName.trim() !== '' && this.projectDesc.trim().length >= 20 && this.budget !== '' && this.timeline !== '';
                    },
                    nextStep() {
                        if(this.step === 1 && !this.validateStep1()) {
                            alert('Please select at least one desired capability/service.');
                            return;
                        }
                        if(this.step === 2 && !this.validateStep2()) {
                            alert('Please provide valid project parameters (Name, Min 20 char description, Budget, Timeline).');
                            return;
                        }
                        if(this.step < 3) this.step++;
                    }
                 }"
                 class="bg-surface border border-border rounded-3xl p-8 md:p-12 shadow-2xl reveal">

                 {{-- Top Progress Matrix --}}
                 <div class="flex items-center justify-between mb-12 relative">
                     <div class="absolute h-0.5 bg-border top-1/2 left-0 right-0 -translate-y-1/2 z-0"></div>
                     <div class="absolute h-0.5 bg-gradient-to-r from-primary to-secondary top-1/2 left-0 -translate-y-1/2 z-0 transition-all duration-500" 
                          :style="'width: ' + ((step - 1) / 2 * 100) + '%'"></div>
                     
                     {{-- Step Node 1 --}}
                     <div class="relative z-10 text-center">
                         <div :class="step >= 1 ? 'bg-primary border-primary text-white shadow-lg shadow-primary/20' : 'bg-surface-light border-border text-muted'"
                              class="w-10 h-10 rounded-full flex items-center justify-center border-2 font-bold text-sm transition-all duration-300"
                              style="font-family: var(--font-display)">1</div>
                         <span :class="step >= 1 ? 'text-text font-bold' : 'text-muted'" class="text-xs mt-2 block font-semibold tracking-wider uppercase" style="font-family: var(--font-display)">Capabilites</span>
                     </div>

                     {{-- Step Node 2 --}}
                     <div class="relative z-10 text-center">
                         <div :class="step >= 2 ? 'bg-primary border-primary text-white shadow-lg shadow-primary/20' : 'bg-surface-light border-border text-muted'"
                              class="w-10 h-10 rounded-full flex items-center justify-center border-2 font-bold text-sm transition-all duration-300"
                              style="font-family: var(--font-display)">2</div>
                         <span :class="step >= 2 ? 'text-text font-bold' : 'text-muted'" class="text-xs mt-2 block font-semibold tracking-wider uppercase" style="font-family: var(--font-display)">Scope</span>
                     </div>

                     {{-- Step Node 3 --}}
                     <div class="relative z-10 text-center">
                         <div :class="step === 3 ? 'bg-secondary border-secondary text-white shadow-lg shadow-secondary/20' : 'bg-surface-light border-border text-muted'"
                              class="w-10 h-10 rounded-full flex items-center justify-center border-2 font-bold text-sm transition-all duration-300"
                              style="font-family: var(--font-display)">3</div>
                         <span :class="step === 3 ? 'text-text font-bold' : 'text-muted'" class="text-xs mt-2 block font-semibold tracking-wider uppercase" style="font-family: var(--font-display)">Identity</span>
                     </div>
                 </div>

                 {{-- Display server errors if step 3 validation fails after submit --}}
                 @if ($errors->any())
                     <div class="glass border-red-500/30 p-4 rounded-xl mb-8">
                         <p class="text-red-400 font-bold text-sm mb-2">Server verification alert:</p>
                         <ul class="list-disc list-inside text-xs text-red-300 space-y-1">
                             @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                 @endif

                 <form action="{{ route('quote.submit') }}" method="POST" x-on:submit="if(step < 3) { $event.preventDefault(); nextStep(); }">
                     @csrf

                     {{-- STEP 1: SERVICES --}}
                     <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                         <h3 class="text-xl md:text-2xl font-bold text-text mb-4" style="font-family: var(--font-display)">Which Capabilities Do You Require?</h3>
                         <p class="text-muted text-sm mb-8">Select all alignment modules appropriate for your business model.</p>
                         
                         <div class="grid sm:grid-cols-2 gap-4">
                             @php
                                 $opts = ['Custom Web Design', 'Bespoke Web App Dev', 'E-Commerce Rig', 'Brand Architecture', 'SEO Supremacy Campagin', 'Ongoing Ops Retainer'];
                             @endphp
                             @foreach($opts as $opt)
                                 <label class="relative border rounded-2xl p-5 flex items-center gap-4 cursor-pointer hover:border-primary group transition-all duration-300"
                                        :class="services.includes('{{ $opt }}') ? 'border-primary bg-primary/5' : 'border-border bg-surface-light'">
                                     <input type="checkbox" name="services[]" value="{{ $opt }}" x-model="services" class="hidden">
                                     <div class="w-6 h-6 rounded-md border flex items-center justify-center transition-all duration-300 shrink-0"
                                          :class="services.includes('{{ $opt }}') ? 'border-primary bg-primary text-white' : 'border-muted group-hover:border-primary'">
                                         <svg x-show="services.includes('{{ $opt }}')" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                     </div>
                                     <span class="text-sm font-bold text-text" style="font-family: var(--font-display)">{{ $opt }}</span>
                                 </label>
                             @endforeach
                         </div>
                     </div>

                     {{-- STEP 2: PROJECT DETAILS --}}
                     <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                         <h3 class="text-xl md:text-2xl font-bold text-text mb-2" style="font-family: var(--font-display)">Scope Metrics & Core Blueprint</h3>
                         <p class="text-muted text-sm mb-6">Define tactical ranges for proper pipeline scoping.</p>

                         <div class="grid sm:grid-cols-2 gap-6">
                             <div>
                                 <label for="project_name" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Project Label *</label>
                                 <input type="text" name="project_name" id="project_name" x-model="projectName" class="form-input" placeholder="Enterprise Rebrand 2026">
                             </div>
                             <div>
                                 <label for="target_audience" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Primary Demographic</label>
                                 <input type="text" name="target_audience" id="target_audience" x-model="targetAudience" class="form-input" placeholder="B2B C-Suite, High Net Worth...">
                             </div>
                         </div>

                         <div class="grid sm:grid-cols-2 gap-6">
                             <div>
                                 <label for="budget" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Budget Model *</label>
                                 <select name="budget" id="budget" x-model="budget" class="form-input bg-surface select-dark">
                                     <option value="">Choose Allocation Range...</option>
                                     <option value="$5,000 - $10,000">$5,000 - $10,000</option>
                                     <option value="$10,000 - $25,000">$10,000 - $25,000</option>
                                     <option value="$25,000 - $50,000">$25,000 - $50,000</option>
                                     <option value="$50,000+">$50,000+ Enterprise Scale</option>
                                 </select>
                             </div>
                             <div>
                                 <label for="timeline" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Launch Runway *</label>
                                 <select name="timeline" id="timeline" x-model="timeline" class="form-input bg-surface select-dark">
                                     <option value="">Choose Hard Deadline Range...</option>
                                     <option value="Under 1 Month">Accelerated (Under 1 Month)</option>
                                     <option value="1 - 3 Months">Standard Runway (1 - 3 Months)</option>
                                     <option value="3 - 6 Months">Comprehensive Execution (3 - 6 Months)</option>
                                 </select>
                             </div>
                         </div>

                         <div>
                             <label for="project_description" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Objective Scope Summary *</label>
                             <textarea name="project_description" id="project_description" x-model="projectDesc" rows="5" class="form-input resize-none" placeholder="Briefly summarize required KPIs, existing pain points and expected operational deliverables (Min 20 chars)..."></textarea>
                         </div>
                     </div>

                     {{-- STEP 3: CONTACT INFO --}}
                     <div x-show="step === 3" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-6">
                         <h3 class="text-xl md:text-2xl font-bold text-text mb-2" style="font-family: var(--font-display)">Identity Vectors</h3>
                         <p class="text-muted text-sm mb-6">Who is leading the strategic alignement on the corporate team?</p>

                         <div class="grid sm:grid-cols-2 gap-6">
                             <div>
                                 <label for="name" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Full Identity *</label>
                                 <input type="text" name="name" id="name" x-model="clientName" class="form-input" placeholder="Sarah Mitchell" required>
                             </div>
                             <div>
                                 <label for="company" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Corporate entity</label>
                                 <input type="text" name="company" id="company" x-model="company" class="form-input" placeholder="Luxe Fashion Group">
                             </div>
                         </div>

                         <div class="grid sm:grid-cols-2 gap-6">
                             <div>
                                 <label for="email" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Secure Email Vector *</label>
                                 <input type="email" name="email" id="email" x-model="clientEmail" class="form-input" placeholder="sarah@luxefashion.com" required>
                             </div>
                             <div>
                                 <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Phone</label>
                                 <input type="text" name="phone" id="phone" x-model="clientPhone" class="form-input" placeholder="+212 6...">
                             </div>
                         </div>

                         <div>
                             <label for="source" class="block text-xs font-bold uppercase tracking-wider text-muted mb-2" style="font-family: var(--font-display)">Discovery Vector</label>
                             <select name="source" id="source" x-model="source" class="form-input bg-surface select-dark">
                                 <option value="">How did you discover DARDAA WEB?</option>
                                 <option value="Search Engine">Organic Search / Google</option>
                                 <option value="Social Platform">LinkedIn / Twitter / Behance</option>
                                 <option value="Word of Mouth">Peer Referral / Word of Mouth</option>
                                 <option value="Previous Work">Spotted our signature on active sites</option>
                             </select>
                         </div>
                     </div>

                     {{-- Bottom Controls --}}
                     <div class="flex justify-between items-center mt-12 border-t border-border/50 pt-6">
                         <button type="button" x-show="step > 1" @click="step--" class="btn-secondary !px-6 py-3 text-sm flex items-center gap-2">
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                             Retreat Step
                         </button>
                         
                         <div x-show="step === 1"></div> {{-- spacer --}}

                         <button type="button" x-show="step < 3" @click="nextStep()" class="btn-primary !px-8 py-3.5 text-sm flex items-center gap-2 ml-auto shadow-lg shadow-primary/20">
                             Advance Alignment
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                         </button>

                         <button type="submit" x-show="step === 3" class="btn-primary !bg-gradient-to-r from-primary to-secondary !px-10 py-4 font-bold text-white rounded-full shadow-2xl transition-all hover:scale-105 hover:shadow-primary/30 ml-auto">
                             Verify & Launch Proposal
                         </button>
                     </div>
                 </form>

            </div>
        </div>
    </section>
@endsection
