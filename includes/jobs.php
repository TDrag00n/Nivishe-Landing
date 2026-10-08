<?php
/**
 * Open roles shown on careers.php.
 *
 * The wording comes from each role's Terms of Reference and is kept as written
 * there. To close a role, delete its block (or set 'open' => false). To add a
 * closing date, fill in 'closes' — it only appears on the page when set.
 */

if (!defined('NIVISHE_APP')) {
    http_response_code(403);
    exit('Direct access is not permitted.');
}

return [

    /* ================================================================== */
    [
        'slug'       => 'grants-lead',
        'title'      => 'Grants Lead',
        'type'       => 'Full-time',
        'location'   => 'Nairobi, Kenya',
        'reports_to' => 'Finance Director',
        'apply_url'  => 'https://forms.cloud.microsoft/r/1vysb95Zx8',
        'closes'     => '',
        'open'       => true,

        'summary' => 'Lead the organization’s grants and resource mobilization function by coordinating funding opportunities, developing high-quality proposals, strengthening donor compliance and ensuring that grant commitments, reporting requirements and internal follow-up actions are effectively managed.',

        'background' => 'Nivishe Foundation seeks to strengthen its resource mobilization, grant management and donor stewardship systems. The Grants Lead will provide strategic and operational leadership across the funding cycle, helping the organization identify suitable opportunities, develop strong submissions, coordinate grant implementation requirements and maintain clear relationships with funders and internal teams.',

        'highlights' => [
            'Build and run the funding pipeline, from opportunity research to bid planning',
            'Lead concept notes, expressions of interest and full proposals',
            'Own grant compliance, reporting calendars and donor stewardship',
        ],

        'responsibilities' => [
            'Resource mobilization strategy' => [
                'Develop and maintain a grants and resource mobilization pipeline aligned with organizational priorities.',
                'Research and assess funding opportunities from foundations, institutions, corporate partners and other suitable sources.',
                'Support annual funding targets, opportunity prioritization and bid planning.',
                'Provide regular pipeline updates, risk flags and recommendations to leadership.',
            ],
            'Proposal and concept development' => [
                'Lead the development of concept notes, expressions of interest and full proposals.',
                'Coordinate inputs from Programs, Finance, Operations, Communications and technical contributors.',
                'Develop clear problem statements, objectives, activities, results frameworks, budgets and supporting narratives.',
                'Ensure submissions are compelling, evidence-informed, compliant and delivered on time.',
                'Maintain a library of approved institutional language, evidence, budgets and supporting documents.',
            ],
            'Grant management and compliance' => [
                'Review grant agreements and summarize key obligations, deliverables, reporting dates and compliance requirements.',
                'Maintain grant trackers, calendars, award files and documentation repositories.',
                'Coordinate grant start-up, implementation check-ins, amendments, close-out and lessons learned.',
                'Work with Finance and relevant teams to monitor spending, deliverables and compliance.',
                'Identify grant risks early and coordinate corrective action and escalation where needed.',
            ],
            'Donor reporting and stewardship' => [
                'Coordinate timely narrative and financial reporting with responsible teams.',
                'Edit and quality-check donor reports for accuracy, consistency and clarity.',
                'Maintain organized records of donor communication, feedback, approvals and commitments.',
                'Prepare briefings, updates and meeting materials for funder engagement.',
                'Support professional and responsive relationships with current and prospective funders.',
            ],
            'Internal coordination and systems strengthening' => [
                'Establish clear workflows, roles, templates and quality checks for grant development and management.',
                'Coordinate proposal and reporting schedules across departments.',
                'Facilitate grant review meetings and track agreed actions.',
                'Build staff capacity in proposal writing, donor compliance and grant documentation.',
                'Ensure institutional records and due diligence materials remain current and easy to access.',
            ],
            'Partnerships and representation' => [
                'Support partnership development with institutions, consortium members and technical collaborators.',
                'Coordinate partner inputs, documentation and submission requirements for joint bids.',
                'Represent the organization in selected donor, partner and sector engagements.',
                'Support due diligence, partnership agreements and follow-up actions.',
            ],
        ],

        'deliverables' => [
            'An active and regularly updated funding pipeline and grants calendar.',
            'High-quality concept notes, proposals and supporting submission packages.',
            'Accurate grant files, obligation summaries, compliance trackers and reporting schedules.',
            'Timely donor reports and funder communication materials.',
            'Regular management updates on funding prospects, awards, risks and required decisions.',
            'Improved grant development and management tools, templates and workflows.',
        ],

        'qualifications' => [
            'Bachelor’s degree in development studies, business, communications, social sciences, international relations, finance or a related field.',
            'At least five years of relevant experience in fundraising, proposal development, grant management or donor reporting.',
            'Demonstrated success coordinating complex proposals and donor submissions.',
            'Experience managing grant compliance, reporting calendars and cross-functional inputs.',
            'Strong understanding of budgets, results frameworks and donor requirements.',
            'Experience in nonprofit, development, public health, education or social impact settings is an advantage.',
            'Excellent written and spoken English.',
        ],

        'competencies' => [
            'Excellent proposal writing, editing and persuasive communication skills.',
            'Strong planning, coordination and deadline management.',
            'Sound judgment, attention to detail and commitment to compliance.',
            'Ability to understand budgets, results frameworks and implementation plans.',
            'Strong relationship management and professional communication.',
            'Ability to manage multiple submissions and reporting processes at once.',
            'Integrity, discretion, initiative and consistent follow-through.',
        ],

        'profile' => 'The ideal candidate is a strategic and hands-on grants professional who can move confidently between opportunity research, proposal design, donor communication, compliance and internal coordination. The candidate should be an excellent writer, an organized systems builder and a dependable collaborator who maintains quality under tight deadlines.',
    ],

    /* ================================================================== */
    [
        'slug'       => 'monitoring-and-evaluation-consultant',
        'title'      => 'Monitoring and Evaluation Consultant',
        'type'       => 'Consultancy',
        'location'   => 'Nairobi, Kenya',
        'reports_to' => 'Operations Director',
        'apply_url'  => 'https://forms.cloud.microsoft/r/cmB6d2BFEp',
        'closes'     => '',
        'open'       => true,

        'summary' => 'Provide technical support that strengthens the organization’s monitoring and evaluation systems, improves the quality and use of data and builds practical capacity for consistent evidence collection, analysis, reporting and learning.',

        'background' => 'Nivishe Foundation seeks consultancy support to strengthen monitoring, evaluation, accountability and learning across its organizational work. The consultant will provide focused technical assistance to improve measurement frameworks, data collection tools, reporting systems, data quality and the practical use of findings for planning and improvement.',

        'highlights' => [
            'Review the existing system and recommend practical improvements',
            'Rebuild results frameworks, indicators and data collection tools',
            'Train staff and hand over tools they can maintain themselves',
        ],

        'responsibilities' => [
            'Inception and systems review' => [
                'Review existing results frameworks, indicators, data collection tools, reporting templates and information flows.',
                'Consult relevant staff to understand current practices, gaps, priorities and decision-making needs.',
                'Prepare an inception note with the proposed approach, workplan, deliverables and required inputs.',
                'Recommend practical improvements suited to the organization’s size, capacity and operating context.',
            ],
            'Results frameworks and indicators' => [
                'Review or develop clear theories of change, results frameworks and indicator reference sheets.',
                'Define measurable indicators, baselines, targets, data sources, collection frequency and responsible persons.',
                'Ensure indicators are relevant, feasible, disaggregated where appropriate and aligned with reporting requirements.',
                'Develop guidance that supports consistent interpretation and use of indicators.',
            ],
            'Data collection tools and systems' => [
                'Review and improve quantitative and qualitative data collection tools.',
                'Develop practical registers, forms, trackers, feedback tools and reporting templates where needed.',
                'Support clear data flows from collection through verification, storage, analysis and reporting.',
                'Recommend secure, accessible and proportionate approaches to data management and documentation.',
            ],
            'Data quality, analysis and reporting' => [
                'Develop or strengthen data quality assurance procedures and routine verification checks.',
                'Support analysis and interpretation of outcome, output, feedback and implementation data.',
                'Develop dashboards or summary formats that make findings easy to understand and use.',
                'Support preparation of evidence summaries, evaluation findings and donor-facing results sections.',
                'Document data limitations, assumptions and recommended corrective actions.',
            ],
            'Learning and adaptive management' => [
                'Design or facilitate reflection, learning and after-action review processes.',
                'Support teams to identify lessons, patterns, risks and improvement actions from available evidence.',
                'Develop practical mechanisms for tracking decisions and changes arising from learning.',
                'Promote ethical and responsible use of community feedback and lived experience.',
            ],
            'Capacity strengthening and handover' => [
                'Train relevant staff on indicators, tools, data quality, analysis, reporting and evidence use.',
                'Provide user-friendly manuals, templates and standard operating guidance.',
                'Offer coaching during initial implementation of improved systems.',
                'Complete a structured handover of tools, files, recommendations and outstanding actions.',
            ],
        ],

        'deliverables' => [
            'An inception report and approved consultancy workplan.',
            'A review of the existing monitoring and evaluation system, including prioritized recommendations.',
            'Updated results frameworks, indicator reference sheets and measurement plans.',
            'Revised data collection, quality assurance, analysis and reporting tools.',
            'A practical monitoring and evaluation manual or standard operating guide.',
            'Staff training sessions and supporting materials.',
            'A final report summarizing work completed, key findings, remaining gaps and recommended next steps.',
        ],

        'qualifications' => [
            'Advanced degree in monitoring and evaluation, statistics, economics, public health, development studies, social sciences or a related field.',
            'At least five years of relevant experience designing or strengthening monitoring and evaluation systems.',
            'Demonstrated experience with results frameworks, indicators, mixed-method data collection, data quality and reporting.',
            'Experience developing practical tools, guidance documents and staff training materials.',
            'Strong analytical skills and ability to present findings clearly to technical and non-technical audiences.',
            'Experience in nonprofit, development, public health, education or social impact settings is an advantage.',
            'Proficiency with suitable data analysis, visualization and digital data collection tools.',
        ],

        'competencies' => [
            'Strong technical knowledge of monitoring, evaluation, accountability and learning.',
            'Excellent analytical, facilitation and report-writing skills.',
            'Ability to design practical systems that teams can maintain.',
            'Strong attention to data quality, ethics, confidentiality and safeguarding.',
            'Clear communication and collaborative stakeholder engagement.',
            'Ability to work independently, manage deliverables and meet agreed timelines.',
            'Commitment to inclusive, participatory and evidence-informed practice.',
        ],

        'profile' => 'The ideal consultant is a practical and collaborative monitoring and evaluation specialist who can assess existing systems, simplify complex requirements and leave behind tools that staff can confidently use. The consultant should combine technical rigor with clear communication, sound judgment and a strong commitment to ethical data practice and organizational learning.',
    ],

    /* ================================================================== */
    [
        'slug'       => 'research-learning-and-knowledge-management-officer',
        'title'      => 'Research, Learning and Knowledge Management Officer',
        'type'       => 'Full-time',
        'location'   => 'Nairobi, Kenya',
        'reports_to' => 'Operations Director',
        'apply_url'  => 'https://forms.cloud.microsoft/r/4Vp7qBgYYj',
        'closes'     => '',
        'open'       => true,

        'summary' => 'Strengthen institutional learning and evidence use by supporting research activities, managing knowledge systems, documenting organizational learning and translating evidence into accessible products for internal and external audiences.',

        'background' => 'Nivishe Foundation is committed to generating, capturing, translating and applying evidence to strengthen organizational practice, inform decision-making and contribute to wider sector learning. As the organization grows, there is a need for a dedicated professional to strengthen research processes, institutional learning, documentation systems and knowledge management practices. The role will help ensure that research findings, implementation insights and lessons learned are transformed into practical knowledge products that improve quality, support resource mobilization, strengthen partnerships and promote evidence-informed action.',

        'highlights' => [
            'Support research, evidence scans, synthesis and publications',
            'Build the institutional knowledge repository and documentation standards',
            'Turn complex evidence into briefs, case studies and practitioner tools',
        ],

        'responsibilities' => [
            'Research and evidence generation' => [
                'Support the design and implementation of research, assessments, studies and learning initiatives.',
                'Conduct literature reviews, evidence scans and desk research.',
                'Support the analysis and synthesis of quantitative and qualitative findings.',
                'Contribute to research reports, learning papers, journal manuscripts, policy briefs, evidence summaries, case studies and conference abstracts.',
                'Support compliance with ethical, safeguarding and research quality standards.',
            ],
            'Knowledge management and documentation' => [
                'Maintain organized repositories for research tools, protocols, approvals, consent materials, datasets, transcripts, reports, learning notes and knowledge products.',
                'Develop and maintain systems for version control, documentation, evidence tracking, decision logs and institutional archiving.',
                'Create templates, trackers, checklists, study manuals and workflows that improve consistency and efficiency.',
                'Document lessons learned, implementation experiences, innovations and organizational knowledge.',
                'Support consistent documentation standards across organizational initiatives and workstreams.',
            ],
            'Learning and knowledge translation' => [
                'Translate complex evidence into clear, practical and accessible products for diverse audiences.',
                'Develop learning briefs, evidence summaries, presentations, public-facing resources and practitioner tools.',
                'Facilitate internal reflection, learning and knowledge-sharing sessions.',
                'Support teams to apply evidence and learning in planning, implementation and decision-making.',
                'Promote cross-team learning and responsible use of community knowledge.',
            ],
            'Content adaptation, language and accessibility' => [
                'Support culturally responsive translation, localization and adaptation of information and learning materials.',
                'Assist in reviewing terminology and content for clarity, accuracy, cultural relevance and accessibility.',
                'Coordinate input from subject experts, practitioners, community reviewers, educators, creatives and other contributors.',
                'Support the development and adaptation of community-facing educational and knowledge resources.',
            ],
            'Publications and dissemination' => [
                'Support the development, editing and publication of research and learning products.',
                'Coordinate dissemination through webinars, workshops, conferences, learning forums and digital platforms.',
                'Work with the Communications team to ensure evidence is presented accurately, ethically and accessibly.',
                'Contribute to articles, blogs, newsletters and thought leadership content.',
            ],
            'Monitoring, evaluation and learning support' => [
                'Work closely with relevant teams to synthesize evaluation findings, outcome data, feedback and implementation evidence.',
                'Document lessons learned, outcome stories, case studies and improvement actions.',
                'Contribute to quality assurance by reviewing protocols, tools, consent materials, data collection guides and reports for clarity and consistency.',
                'Support consistent use of measurement tools and documentation of changes, corrective actions and learning decisions.',
                'Support training on research documentation, ethics, data quality and evidence communication where required.',
            ],
            'Resource mobilization and reporting' => [
                'Support the development of concept notes, proposals, expressions of interest, donor reports and evidence updates.',
                'Contribute evidence, lessons and organizational achievements to fundraising and reporting documents.',
                'Coordinate the collection and synthesis of information required for proposals and reports.',
                'Help ensure submissions are evidence-informed, well documented and aligned with organizational priorities.',
            ],
            'Partnerships and stakeholder engagement' => [
                'Support collaboration with academic institutions, government agencies, funders, civil society organizations and technical partners.',
                'Coordinate learning and knowledge-sharing initiatives with external stakeholders.',
                'Maintain records of partner engagements, joint workplans, deliverables, meeting notes and follow-up actions.',
                'Support the preparation of partnership and stakeholder communication materials.',
            ],
        ],

        'deliverables' => [
            'High-quality research, evidence and learning products produced according to agreed workplans.',
            'An updated and well-organized institutional knowledge repository.',
            'Documentation of lessons learned, case studies and implementation insights.',
            'Timely research inputs for proposals, partner materials and donor reports.',
            'Regular internal learning and knowledge-sharing sessions supported or facilitated.',
            'Accurate tracking of research, publication and partnership deliverables.',
        ],

        'qualifications' => [
            'Bachelor’s degree in psychology, public health, sociology, anthropology, education, linguistics, translation studies, communications, development studies, social sciences or a related field.',
            'At least three years of relevant experience in research, learning, knowledge management, monitoring and evaluation, documentation or a related field.',
            'Demonstrated experience in research writing, report writing, evidence synthesis, policy briefs, publications, donor reports or knowledge products.',
            'Experience supporting program documentation and organizational learning processes.',
            'Experience working with multidisciplinary teams and external stakeholders.',
            'Familiarity with digital collaboration tools and knowledge management systems.',
            'Strong command of English. Strong Kiswahili writing, translation or linguistic skills are an advantage.',
            'Experience in community-based, public health, education, social impact or mental health settings is an advantage.',
        ],

        'competencies' => [
            'Excellent research writing, editing, analytical and synthesis skills.',
            'Ability to translate technical information into clear and accessible content.',
            'Strong organization, documentation discipline and attention to detail.',
            'Knowledge of research ethics, inclusive practice and responsible storytelling.',
            'Strong project coordination, communication and stakeholder engagement skills.',
            'Ability to manage multiple priorities, work across teams and meet deadlines.',
            'Commitment to community dignity, accessibility, inclusion and evidence-informed practice.',
        ],

        'profile' => 'The ideal candidate is a thoughtful writer, researcher, knowledge facilitator and systems builder who can move comfortably between community insights, organizational data, academic evidence, donor requirements and policy conversations. The candidate should be curious, ethical, organized and collaborative, with a strong commitment to ensuring that evidence and experience are captured, shared and used to improve practice and contribute to meaningful change.',
    ],
];
