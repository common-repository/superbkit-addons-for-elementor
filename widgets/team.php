<?php
/**
 * Elementor Team Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Ha_Elementor_Team_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Team widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Team widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Team', 'superbkit-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Team widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-user-friends';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Team widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register Team widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

  /* ==========================================================================
   Team  Tab Start
   ========================================================================== */


  /* ==========================================================================
   Team image Tab Start
   ========================================================================== */
		$this->start_controls_section(
			'team_image1',
			[
				'label' => __( 'Image', 'superbkit-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Team Image 
		$this->add_control(
			'team_image',
			[
				'label' => __( 'Choose Image', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();



		// Team image style start
		$this->start_controls_section(
			'team_style_image',
			[
				'label' => __( 'Image', 'superbkit-addons' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Team width style start
		$this->add_responsive_control(
			'team_image_width',
			[
				'label' => __( 'Width', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vw' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'vw' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .team-area img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team max-width style start
		$this->add_responsive_control(
			'team_image_max_width',
			[
				'label' => __( 'Max Width', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vw' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'vw' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .team-area img' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Team height style start
		$this->add_responsive_control(
			'height_image_height',
			[
				'label' => __( 'Height', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					
				],
				'selectors' => [
					'{{WRAPPER}} .team-area img' => 'height: {{SIZE}}{{UNIT}};',
				],
				
			]
		);



    $this->start_controls_tabs( 'team_image_style' );


    // Team image normal Style
    $this->start_controls_tab(
        'team_iamge_normal',
        [
            'label' => __( 'Normal', 'superbkit-addons' ),

        ]
    );

   //  Team image opacity
	$this->add_control(
		'team_image_opacity',
		[
			'label' => __( 'Opacity (%)', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'default' => [
				'size' => 1,
			],
			'range' => [
				'px' => [
					'max' => 1,
					'min' => 0.10,
					'step' => 0.01,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .team-area img' => 'opacity: {{SIZE}};',
			],
			'separator' => 'after',
		]
	);
        

	//  Team image Border
	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'team_image_border',
			'label' => __( 'Border', 'superbkit-addons' ),
			'selector' => '{{WRAPPER}} .team-area img',
		]
	);

	//  Team image Border Radius
	$this->add_responsive_control(
		'team_image_border_radius',
		[
			'label' => __( 'Border Radius', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .team-area img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	//  Team image Border Radius
	$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'team_image_box_shadow',
			'label' => __( 'Box Shadow', 'superbkit-addons' ),
			'selector' => '{{WRAPPER}} .team-area img',
		]
	);
   

    $this->end_controls_tab();


	// Team image hover Style
    $this->start_controls_tab(
        'team_image_hover',
        [
            'label' => __( 'Hover', 'superbkit-addons' ),
        ]
    );

     //  Team image hover opacity
	$this->add_control(
		'team_image_hover_opacity',
		[
			'label' => __( 'Opacity (%)', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'default' => [
				'size' => 1,
			],
			'range' => [
				'px' => [
					'max' => 1,
					'min' => 0.10,
					'step' => 0.01,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .team-area img:hover' => 'opacity: {{SIZE}};',
			],
			'separator' => 'after',
		]
	);

	//  Team image hover border
	$this->add_group_control(
		\Elementor\Group_Control_Border::get_type(),
		[
			'name' => 'team_hover_image_border',
			'label' => __( 'Border', 'superbkit-addons' ),
			'selector' => '{{WRAPPER}} .team-area img:hover',
		]
	);

	//  Team image hover border radius
	$this->add_responsive_control(
		'team_image_hover_border_radius',
		[
			'label' => __( 'Border Radius', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%' ],
			'selectors' => [
				'{{WRAPPER}} .team-area img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	//  Team image hover box shadow
	$this->add_group_control(
		\Elementor\Group_Control_Box_Shadow::get_type(),
		[
			'name' => 'team_image_hover_box_shadow',
			'label' => __( 'Box Shadow', 'superbkit-addons' ),
			'selector' => '{{WRAPPER}} .team-area img:hover',
		]
	);



    $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->end_controls_section();

  /* ==========================================================================
   Team image tab end
   ========================================================================== */


   /* ==========================================================================
   Team title & sub title Tab start
   ========================================================================== */

	//  team title start 
	$this->start_controls_section(
		'team_title',
		[
			'label' => __( 'Title', 'superbkit-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	// team title text 
	$this->add_control(
		'team_title_text',
		[
			'label' => __( 'Title', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::TEXT,
			'label_block' => true,
			'default' => __( 'Add Your Title', 'superbkit-addons' ),
			'placeholder' => __( 'Write Your Title Here', 'superbkit-addons' ),
		]
	);

	// team Sub title  
	$this->add_control(
		'team_subtitle',
		[
			'label' => __( 'Sub Title', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default' => __( 'Add Your Sub Title', 'superbkit-addons' ),
			'placeholder' => __( 'Type your description here', 'superbkit-addons' ),
		]
	);


	$this->end_controls_section();


		// Team title style start
		$this->start_controls_section(
			'team_style_title_subtitle',
			[
				'label' => __( 'Title', 'superbkit-addons' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Team title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_title_typography',
				'label' => __( 'Title Typography', 'superbkit-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-title h3',
				'separator' => 'before',
			]
		);

		
			$this->start_controls_tabs( 'team_title_style' );
		
		
			// Team title normal style
			$this->start_controls_tab(
				'team_title_normal',
				[
					'label' => __( 'Normal', 'superbkit-addons' ),
		
				]
			);
		
			// Team title color
			$this->add_control(
				'team_title_color',
				[
					'label' => __( 'Title Color', 'superbkit-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_1,
					],
					'default' => '#233d63',
					'selectors' => [
						'{{WRAPPER}} .team-title h3' => 'color: {{VALUE}}',
					],
				]
			);

			// Team title text shadow
			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'team_title_shadow',
					'label' => __( 'Text Shadow', 'superbkit-addons' ),
					'selector' => '{{WRAPPER}} .team-title h3',
				]
			);
	
			
				
		
			$this->end_controls_tab();
		
		
			// Team title hover style
			$this->start_controls_tab(
				'team_title_hover',
				[
					'label' => __( 'Hover', 'superbkit-addons' ),
				]
			);
		
					// Team title hover color
					$this->add_control(
						'team_title_hover_color',
						[
							'label' => __( 'Title Color', 'superbkit-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
							],
							'default' => '#233d63',
							'selectors' => [
								'{{WRAPPER}} .team-title h3:hover' => 'color: {{VALUE}}',
							],
						]
					);
		
					// Team title hover text shadow
					$this->add_group_control(
						\Elementor\Group_Control_Text_Shadow::get_type(),
						[
							'name' => 'team_title_hover_shadow',
							'label' => __( 'Text Shadow', 'superbkit-addons' ),
							'selector' => '{{WRAPPER}} .team-title h3:hover',
						]
					);
	
		
			$this->end_controls_tab();
		
			$this->end_controls_tabs();



		// Team sub title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_subtitle_typography',
				'label' => __( 'Sub Title Typography', 'superbkit-addons' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .team-title p',
				'separator' => 'after',
			]
		);

		
			$this->start_controls_tabs( 'team_subtitle_style' );
		
		
			// Team sub title normal style
			$this->start_controls_tab(
				'team_subtitle_normal',
				[
					'label' => __( 'Normal', 'superbkit-addons' ),
		
				]
			);
		
			// Team sub title color
			$this->add_control(
				'team_subtitle_color',
				[
					'label' => __( 'Sub Title Color', 'superbkit-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'scheme' => [
						'type' => \Elementor\Scheme_Color::get_type(),
						'value' => \Elementor\Scheme_Color::COLOR_1,
					],
					'default' => '#039be6',
					'selectors' => [
						'{{WRAPPER}} .team-title p' => 'color: {{VALUE}}',
					],
				]
			);

			// Team sub title text shadow
			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'team_subtitle_shadow',
					'label' => __( 'Sub Title Text Shadow', 'superbkit-addons' ),
					'selector' => '{{WRAPPER}} .team-title p',
				]
			);
	
			
				
		
			$this->end_controls_tab();
		
		
			// Team sub title hover style
			$this->start_controls_tab(
				'team_subtitle_hover',
				[
					'label' => __( 'Hover', 'superbkit-addons' ),
				]
			);
		
					// Team sub title hover color
					$this->add_control(
						'team_subtitle_hover_color',
						[
							'label' => __( 'Sub Title Color', 'superbkit-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'scheme' => [
								'type' => \Elementor\Scheme_Color::get_type(),
								'value' => \Elementor\Scheme_Color::COLOR_1,
							],
							'default' => '#039be6',
							'selectors' => [
								'{{WRAPPER}} .team-title p:hover' => 'color: {{VALUE}}',
							],
						]
					);
		
					// Team sub title hover text shadow
					$this->add_group_control(
						\Elementor\Group_Control_Text_Shadow::get_type(),
						[
							'name' => 'team_subtitle_hover_shadow',
							'label' => __( 'Sub Title Text Shadow', 'superbkit-addons' ),
							'selector' => '{{WRAPPER}} .team-title p:hover',
						]
					);
	
		
			$this->end_controls_tab();
		
			$this->end_controls_tabs();
		
			$this->end_controls_section();

   /* ==========================================================================
   Team title & sub title tab end
   ========================================================================== */

  /* ==========================================================================
   Team description tab start
   ========================================================================== */

   	//  team description start 
	$this->start_controls_section(
		'description_title',
		[
			'label' => __( 'Description', 'superbkit-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	//  team description
	$this->add_control(
		'team_description',
		[
			'label' => __( 'Description', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::WYSIWYG,
			'default' => __( 'Add Your description', 'superbkit-addons' ),
			'placeholder' => __( 'Type your description here', 'superbkit-addons' ),
		]
	);

	$this->end_controls_section();


	// Team description style start
	$this->start_controls_section(
		'team_style_description',
		[
			'label' => __( 'Description', 'superbkit-addons' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

	// Team title Typography
	$this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'team_description_typography',
			'label' => __( 'Description Typography', 'superbkit-addons' ),
			'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} .team-details p',
			'separator' => 'before',
		]
	);

	
		$this->start_controls_tabs( 'team_description_style' );
	
	
		// Team description normal style
		$this->start_controls_tab(
			'team_description_normal',
			[
				'label' => __( 'Normal', 'superbkit-addons' ),
	
			]
		);
	
				// Team description color
				$this->add_control(
					'team_description_color',
					[
						'label' => __( 'Description Color', 'superbkit-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
							'type' => \Elementor\Scheme_Color::get_type(),
							'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'default' => '#677286',
						'selectors' => [
							'{{WRAPPER}} .team-details p' => 'color: {{VALUE}}',
						],
					]
				);
	
				// Team description text shadow
				$this->add_group_control(
					\Elementor\Group_Control_Text_Shadow::get_type(),
					[
						'name' => 'team_description_shadow',
						'label' => __( 'Text Shadow', 'superbkit-addons' ),
						'selector' => '{{WRAPPER}} .team-details p',
					]
				);

	

		$this->end_controls_tab();
	
	
		// Team description hover style
		$this->start_controls_tab(
			'team_description_hover',
			[
				'label' => __( 'Hover', 'superbkit-addons' ),
			]
		);
	
		
				// Team description hover color
				$this->add_control(
					'team_description_hover_color',
					[
						'label' => __( 'Description Color', 'superbkit-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'scheme' => [
							'type' => \Elementor\Scheme_Color::get_type(),
							'value' => \Elementor\Scheme_Color::COLOR_1,
						],
						'default' => '#677286',
						'selectors' => [
							'{{WRAPPER}} .team-details p:hover' => 'color: {{VALUE}}',
						],
					]
				);
	
				// Team description hover text shadow
				$this->add_group_control(
					\Elementor\Group_Control_Text_Shadow::get_type(),
					[
						'name' => 'team_description_hover_shadow',
						'label' => __( 'Text Shadow', 'superbkit-addons' ),
						'selector' => '{{WRAPPER}} .team-details p:hover',
					]
				);

		
	
		$this->end_controls_tab();
	
		$this->end_controls_tabs();

		$this->end_controls_section();

   /* ==========================================================================
   Team description tab End
   ========================================================================== */

   /* ==========================================================================
   Team social icon tab start
   ========================================================================== */

   //  Team social icon
	$this->start_controls_section(
		'team_social_icon',
		[
			'label' => __( 'Social Icon', 'superbkit-addons' ),
			'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

	// Team social icon switcher 1
	$this->add_control(
		'team_icon1_switcher',
		[
			'label' => __( 'Show Icon', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'superbkit-addons' ),
			'label_off' => __( 'Hide', 'superbkit-addons' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);

	// Team social Icon Tab
	$this->add_control(
		'team_icon_fb',
		[
			'label' => __( 'Icon 1', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::ICONS,
			'default' => [
				'value' => 'fab fa-facebook-f',
				'library' => 'solid',
			],
			'condition' => [
				'team_icon1_switcher' => 'yes'
			],
		]
	);


		// Team social icon Link
		$this->add_control(
			'team_url_fb',
			[
			'label' => __( 'Link', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::URL,
			'placeholder' => __( 'Wtite icon link Here', 'superbkit-addons' ),
			'condition' => [
				'team_icon1_switcher' => 'yes'
			],
			'condition' => [
				'team_icon2_switcher' => 'yes'
			],
			]
		);


	// Team social icon switcher 2
	$this->add_control(
		'team_icon2_switcher',
		[
			'label' => __( 'Show Icon', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'superbkit-addons' ),
			'label_off' => __( 'Hide', 'superbkit-addons' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);

	// Team social Icon Tab
	$this->add_control(
		'team_icon_in',
		[
			'label' => __( 'Icon 2', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::ICONS,
			'default' => [
				'value' => 'fab fa-twitter',
				'library' => 'solid',
			],
			'condition' => [
				'team_icon2_switcher' => 'yes'
			],
		]
	);

		// Team social icon Link
		$this->add_control(
			'team_url_in',
			[
			'label' => __( 'Link', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::URL,
			'placeholder' => __( 'Wtite icon link Here', 'superbkit-addons' ),
			'condition' => [
				'team_icon2_switcher' => 'yes'
			],
			]
		);

    // Team social icon switcher 3
	$this->add_control(
		'team_icon3_switcher',
		[
			'label' => __( 'Show Icon', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'superbkit-addons' ),
			'label_off' => __( 'Hide', 'superbkit-addons' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);

	// Team social Icon Tab
	$this->add_control(
		'team_icon_link',
		[
			'label' => __( 'Icon 3', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::ICONS,
			'default' => [
				'value' => 'fab fa-instagram',
				'library' => 'solid',
			],
			'condition' => [
				'team_icon3_switcher' => 'yes'
			],
		]
	);

		// Team social icon Link
		$this->add_control(
			'team_url_link',
			[
			'label' => __( 'Link', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::URL,
			'placeholder' => __( 'Wtite icon link Here', 'superbkit-addons' ),
			'condition' => [
				'team_icon3_switcher' => 'yes'
			],
			]
		);
   

    // Team social icon switcher 4
	$this->add_control(
		'team_icon4_switcher',
		[
			'label' => __( 'Show Icon', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::SWITCHER,
			'label_on' => __( 'Show', 'superbkit-addons' ),
			'label_off' => __( 'Hide', 'superbkit-addons' ),
			'return_value' => 'yes',
			'default' => 'yes',
		]
	);

	// Team social Icon Tab
	$this->add_control(
		'team_icon_pin',
		[
			'label' => __( 'Icon 4', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::ICONS,
			'default' => [
				'value' => 'fab fa-linkedin',
				'library' => 'solid',
			],
			'condition' => [
				'team_icon4_switcher' => 'yes'
			],
		]
	);

		// Team social icon Link
		$this->add_control(
			'team_url_pin',
			[
			'label' => __( 'Link', 'superbkit-addons' ),
			'type' => \Elementor\Controls_Manager::URL,
			'placeholder' => __( 'Wtite icon link Here', 'superbkit-addons' ),
			'condition' => [
				'team_icon4_switcher' => 'yes'
			],
			]
		);
   
	$this->end_controls_section();



	// Team Social Icon style start
	$this->start_controls_section(
		'team_social_icon_style_start',
		[
			'label' => __( 'Social Icon', 'superbkit-addons' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		]
	);

		$this->start_controls_tabs( 'team_social_icon_section' );
	
	
		// Team Social Icon normal style
		$this->start_controls_tab(
			'team_social_icon_normal',
			[
				'label' => __( 'Normal', 'superbkit-addons' ),
	
			]
		);
	
		// Team Social Icon color
		$this->add_control(
			'team_social_icon_color',
			[
				'label' => __( 'Icon Color', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .team-details a i' => 'color: {{VALUE}}',
				],
			]
		);

		// Team Social Icon background color
		$this->add_control(
			'team_social_icon_background_color',
			[
				'label' => __( 'Background Color', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#233d63',
				'selectors' => [
					'{{WRAPPER}} .team-details li a' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Team Social Icon font-size
		$this->add_responsive_control(
			'social_icon_size',
			[
				'label' => __( 'Size', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
				],
				'range' => [
					'px' => [
						'min' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-details a' => 'font-size: {{SIZE}}{{UNIT}};',
					
				],
			]
		);

		// Team Social Icon border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'social_icon_border',
				'label' => __( 'Border', 'superbkit-addons' ),
				'selector' => '{{WRAPPER}} .team-details a',
			]
		);

		// Team Social Icon border-radius
		$this->add_control(
			'social_icon_border_radius',
			[
				'label' => __( 'Border Radius', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .team-details a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}}
					 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 
				],
			]
		);

		// Team Social Icon box-shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'social_icon_box_shadow',
				'label' => __( 'Box Shadow', 'superbkit-addons' ),
				'selector' => '{{WRAPPER}} .team-details a',
			]
		);
	

		$this->end_controls_tab();
	
	
		// Team Social Icon hover style
		$this->start_controls_tab(
			'team_social_icon_hover',
			[
				'label' => __( 'Hover', 'superbkit-addons' ),
			]
		);

		// Team Social Icon hover color
		$this->add_control(
			'team_social_icon_hover_color',
			[
				'label' => __( 'Icon Color', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .team-details a i:hover' => 'color: {{VALUE}}',
				],
			]
		);

		// Team Social Icon hover background color
		$this->add_control(
			'team_social_icon_hover_background_color',
			[
				'label' => __( 'Background Color', 'superbkit-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#039be6',
				'selectors' => [
					'{{WRAPPER}} .team-details a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

			// Team Social Icon hover font-size
			$this->add_responsive_control(
				'social_icon_hover_size',
				[
					'label' => __( 'Size', 'superbkit-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'default' => [
						'size' => 18,
					],
					'range' => [
						'px' => [
							'min' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .team-details a:hover' => 'font-size: {{SIZE}}{{UNIT}};',
						
					],
				]
			);
	
			// Team social Icon hover border
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'social_icon_hover_border',
					'label' => __( 'Border', 'superbkit-addons' ),
					'selector' => '{{WRAPPER}} .team-details a:hover',
				]
			);
	
			/// Team social Icon hover border-radius
			$this->add_control(
				'social_icon_hover_border_radius',
				[
					'label' => __( 'Border Radius', 'superbkit-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'separator' => 'before',
					'selectors' => [
						'{{WRAPPER}} .team-details a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}}
						 {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						 
					],
				]
			);
	
			// Team social Icon hover box-shadow
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'social_icon_hover_box_shadow',
					'label' => __( 'Box Shadow', 'superbkit-addons' ),
					'selector' => '{{WRAPPER}} .team-details a:hover',
				]
			);
		
	
		$this->end_controls_tab();
	
		$this->end_controls_tabs();

		$this->end_controls_section();


   /* ==========================================================================
   Team  Tab End
   ========================================================================== */



	}

	/**
	 * Render Team widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		// Team Image variables
		$team_image = $settings ['team_image'];
		// Title & sub title variables
		$team_title_text = $settings ['team_title_text'];
		$team_subtitle = $settings ['team_subtitle'];
		//Description variables
		$team_description = $settings ['team_description'];
		//Icon variables
		$team_icon1_switcher = $settings ['team_icon1_switcher'];
		$team_icon2_switcher = $settings ['team_icon2_switcher'];
		$team_icon3_switcher = $settings ['team_icon3_switcher'];
        $team_icon4_switcher = $settings ['team_icon4_switcher'];
		$team_icon_fb = $settings ['team_icon_fb'];
		$team_url_fb = $settings ['team_url_fb']['url'];
		$team_icon_in = $settings ['team_icon_in'];
		$team_url_in = $settings ['team_url_in']['url'];
		$team_icon_link = $settings ['team_icon_link'];
		$team_url_link = $settings ['team_url_link']['url'];
		$team_icon_pin = $settings ['team_icon_pin'];
		$team_url_pin = $settings ['team_url_pin']['url'];

	
	   ?>
           
	<div class="team-area">
        <img src="<?php echo esc_url( $settings[ 'team_image' ][ 'url' ]) ?>" alt="">
    <div class="team-content">
       <div class="team-title">
        <h3><?php echo $team_title_text ?></h3>
        <p><?php echo $team_subtitle ?></p>
       </div>
        <div class="team-details">
            <p><?php echo $team_description ?></p>
            <ul>
			    <?php if('yes' == $settings['team_icon1_switcher']): ?>	
                <li><a href="<?php echo $team_url_fb ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['team_icon_fb'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
				<?php  endif; ?>
				<?php if('yes' == $settings['team_icon2_switcher']): ?>
                <li><a href="<?php echo $team_url_in ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['team_icon_in'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
				<?php endif; ?>
				<?php if('yes' == $settings['team_icon3_switcher']): ?>
                <li><a href="<?php echo $team_url_link ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['team_icon_link'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
				<?php  endif; ?>
				<?php if('yes' == $settings['team_icon4_switcher']): ?>
                <li><a href="<?php echo $team_url_pin ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['team_icon_pin'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
				<?php  endif; ?>
            </ul>
        </div>
    </div>
   </div>
	   <?php 

	}

}


