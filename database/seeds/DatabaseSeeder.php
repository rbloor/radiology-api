<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        //$this->call(CategoriesTableSeeder::class);
        //$this->call(QuestionsTableSeeder::class);
        //$this->call(AnswersTableSeeder::class);

        /* Add Categories */
        App\Category::create(['name' => 'Cardiothoracic and Vascular']);
        App\Category::create(['name' => 'Musculoskeletal and Trauma']);
        App\Category::create(['name' => 'Gastro-intestinal']);
        App\Category::create(['name' => 'Genito-urinary, Adrenal, Obstetrics & Gynaecology and Breast']);
        App\Category::create(['name' => 'Paediatric']);
        App\Category::create(['name' => 'Neuroradiology and Head & Neck']);

        /* Add Questions */

        // 1
        $question = App\Question::create([
            'name' => 'A 56 year old woman with breast cancer is treated with radiotherapy and chemotherapy. Twenty years later, she presents with increased difficulty in walking over three months. Plain pelvic radiograph is normal. MRI of the lumbar spine shows two foci of low signal in the sacral ala on T1-weighted imaging. Bone scintigraphy shows focal tracer uptake in the sacrum and pubic rami. What is the most likely diagnosis?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 2
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'leukaemic infiltration', 'is_correct' => 0]),
            new App\Answer(['name' => 'multiple myeloma', 'is_correct' => 0]),
            new App\Answer(['name' => 'insufficiency fractures', 'is_correct' => 1]),
            new App\Answer(['name' => 'metastatic breast carcinoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'sacral chordoma', 'is_correct' => 0]),
        ]);
        
        // 2
        $question = App\Question::create([
            'name' => 'An athletic 13 year old boy presents to the emergency department with a painful right hip. Pelvic x-ray demonstrates an irregular shaped bone adjacent to the anterior inferior iliac spine. The avulsion of which muscle is most likely to have caused this injury?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 2
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'iliopsoas', 'is_correct' => 0]),
            new App\Answer(['name' => 'rectus femoris', 'is_correct' => 1]),
            new App\Answer(['name' => 'sartorius', 'is_correct' => 0]),
            new App\Answer(['name' => 'biceps femoris', 'is_correct' => 0]),
            new App\Answer(['name' => 'vastus medialis', 'is_correct' => 0]),
        ]);

        // 3
        $question = App\Question::create([
            'name' => 'A 30 year old man presents with a three month history of right wrist pain and swelling. A radiograph demonstrates a well defined lytic abnormality in the distal radius extending to just below the articular surface. What is the most likely diagnosis?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 2
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'aneurysmal bone cyst', 'is_correct' => 0]),
            new App\Answer(['name' => 'giant cell tumour', 'is_correct' => 1]),
            new App\Answer(['name' => 'fibrous dysplasia', 'is_correct' => 0]),
            new App\Answer(['name' => 'chondromyxoid fibroma', 'is_correct' => 0]),
            new App\Answer(['name' => 'osteoid osteoma', 'is_correct' => 0]),
        ]);

        // 4
        $question = App\Question::create([
            'name' => 'A 35 year old primigravida presents for antenatal ultrasound at 35 weeks\' gestation. The sonographer identifies a focal hyperechoic 3 cm lesion in the right lobe of the mother\'s liver. Hepatitis serology is negative and liver function tests are normal. Post-partum MR scanning shows a central area of high signal intensity on T2-weighted pre-contrast sequences, intense enhancement with IV gadolinium on T1-weighted at 25 seconds post- injection and isodensity with normal liver on T1-weighted at 75 seconds after IV gadolinium. What is the most likely diagnosis?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 3
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'focal nodular hyperplasia', 'is_correct' => 1]),
            new App\Answer(['name' => 'adenoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'haemangioma', 'is_correct' => 0]),
            new App\Answer(['name' => 'hepatocellular carcinoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'metastatic colonic carcinoma', 'is_correct' => 0]),
        ]);

        // 5
        $question = App\Question::create([
            'name' => 'A 40 year old man presents with bright red rectal bleeding, hypotension and tachycardia. He is initially resuscitated. The colonoscopist is unable to negotiate the sigmoid colon and active bleeding is seen from proximal bowel. Endoscopy to the third part of the duodenum is normal. A 99mTc RBC scan demonstrates accumulation across the upper abdomen, interpreted to be the proximal transverse colon. An angiogram is performed. Which vessel should be catheterised to maximise the chance of demonstrating the bleeding point and what would be the most likely cause of this?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 1
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'coeliac axis and villous adenoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'coeliac axis and angiodysplasia', 'is_correct' => 0]),
            new App\Answer(['name' => 'superior mesenteric artery and villous adenoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'superior mesenteric artery and angiodysplasia', 'is_correct' => 1]),
            new App\Answer(['name' => 'inferior mesenteric artery and villous adenoma', 'is_correct' => 0]),
        ]);

        // 6
        $question = App\Question::create([
            'name' => 'A 72 year old man, with a past history of coronary bypass surgery and transient ischaemic attack, comes to the clinic with a nine month history of weight loss and unwillingness to eat due to abdominal pain associated with meals. Investigation shows an iron deficiency anaemia and reduced serum albumin. What is most likely to be found on abdominal imaging?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 3
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'caecal pole mass on double contrast barium enema', 'is_correct' => 0]),
            new App\Answer(['name' => 'multiple polyps on small bowel enema', 'is_correct' => 0]),
            new App\Answer(['name' => 'severe atheromatous disease of the aorta with small bowel wall thickening on abdominal CT', 'is_correct' => 1]),
            new App\Answer(['name' => 'cavernous transformation of the portal vein on superior mesenteric angiography', 'is_correct' => 0]),
            new App\Answer(['name' => 'increased uptake in the region of the terminal ileum on labelled white cell scan', 'is_correct' => 0]),
        ]);

        // 7
        $question = App\Question::create([
            'name' => 'A 50 year old woman develops a non-tender nodule within the left submandibular gland. Ultrasound reveals a hypoechoic mildly lobulated lesion 1 cm in diameter. What is the least likely diagnosis?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 6
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'Warthin\'s tumour', 'is_correct' => 0]),
            new App\Answer(['name' => 'adenoid cystic tumour', 'is_correct' => 0]),
            new App\Answer(['name' => 'intraglandular lymph node', 'is_correct' => 1]),
            new App\Answer(['name' => 'pleomorphic adenoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'post-inflammatory sialectatic cavity', 'is_correct' => 0]),
        ]);

        // 8
        $question = App\Question::create([
            'name' => 'A 50 year old man presents with sudden onset of occipital headache. Cranial CT demonstrates hydrocephalus, subarachnoid haemorrhage and a frontal lobe (gyrus rectus) haematoma. What is the most likely site for the responsible aneurysm?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 6
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'anterior communicating artery', 'is_correct' => 1]),
            new App\Answer(['name' => 'anterior choroidal artery', 'is_correct' => 0]),
            new App\Answer(['name' => 'basilar artery', 'is_correct' => 0]),
            new App\Answer(['name' => 'middle cerebral artery', 'is_correct' => 0]),
            new App\Answer(['name' => 'pericallosal artery', 'is_correct' => 0]),
        ]);

        // 9
        $question = App\Question::create([
            'name' => 'A 40 year old Caucasian labourer presents with altered consciousness. A non-enhanced CT scan reveals a small high attenuation intra-axial lesion with considerable surrounding low attenuation in the adjacent white matter. Clinical improvement occurs with steroid treatment and MRI is performed. On T1-weighted imaging, the lesion returns high signal with surrounding low signal intensity. What is the most likely diagnosis?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 6
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'lymphoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'meningioma', 'is_correct' => 0]),
            new App\Answer(['name' => 'melanoma metastasis', 'is_correct' => 1]),
            new App\Answer(['name' => 'intracranial lipoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'non-small cell lung cancer metastasis', 'is_correct' => 0]),
        ]);

        // 10
        $question = App\Question::create([
            'name' => 'A 52 year old woman has an L5/S1 discectomy. Ten years later, she presents with sudden onset of left foot drop. A gadolinium enhanced MRI scan of the lumbar spine is performed. On T1-weighted images, by what is a recurrent L5/S1 disc prolapse indicated?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 6
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'a non-enhancing extradural mass at L5/S1', 'is_correct' => 1]),
            new App\Answer(['name' => 'an enhancing extradural mass at L5/S1', 'is_correct' => 0]),
            new App\Answer(['name' => 'an enhancing intradural mass at L5/S1', 'is_correct' => 0]),
            new App\Answer(['name' => 'a non-enhancing intradural mass at L5/S1', 'is_correct' => 0]),
            new App\Answer(['name' => 'an enhancing intradural mass at L4/L5', 'is_correct' => 0]),
        ]);

        // 11
        $question = App\Question::create([
            'name' => 'A 56 year old man presents with ataxia and cough headaches. His symptoms increase in severity over three weeks. He stopped smoking five years ago and uses alcohol in moderation. On examination, he has left sided cerebellar signs. Routine biochemical and haematological examinations are normal. A CT scan of the brain shows a solitary 3 cm intra-axial rim enhancing mass in the left cerebellar hemisphere. What is the most likely diagnosis?',
            'source' => 'https://www.rcr.ac.uk/sites/default/files/SpecimenSBAQuestions-CR2A.pdf',
            'type' => 'single',
            'user_id' => 1,
            'category_id' => 6
        ]);
        $question->answers()->saveMany([
            new App\Answer(['name' => 'glioblastoma multiforme', 'is_correct' => 0]),
            new App\Answer(['name' => 'cerebellar haemangioblastoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'ependymoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'medulloblastoma', 'is_correct' => 0]),
            new App\Answer(['name' => 'metastatic carcinoma', 'is_correct' => 1]),
        ]);

        //$this->call(SubmissionsTableSeeder::class);
    }
}
